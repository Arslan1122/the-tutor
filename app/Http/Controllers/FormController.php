<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormBuilderRequest;
use App\Models\FormDetail;
use jazmy\FormBuilder\Events\Form\FormCreated;
use jazmy\FormBuilder\Events\Form\FormDeleted;
use jazmy\FormBuilder\Events\Form\FormUpdated;
use jazmy\FormBuilder\Helper;
use App\Models\Form;
use jazmy\FormBuilder\Requests\SaveFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class FormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Forms";

        $forms = Form::getForUser(auth()->user());

        return view('formbuilder::forms.index', compact('pageTitle', 'forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Create New Form";

        $saveURL = route('formbuilder::forms.store');

        // get the roles to use to populate the make the 'Access' section of the form builder work
        $form_roles = Helper::getConfiguredRoles();

        return view('formbuilder::forms.create', compact('pageTitle', 'saveURL', 'form_roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FormBuilderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilderRequest $request)
    {
        $formBuilderJson = json_decode($request->input('form_builder_json'), true);

        $formBuilderJsonErrors = [];
        foreach ($formBuilderJson as $key => $formField) {

            if (empty($formField['name'])) {
                $formBuilderJsonErrors[$key] = [
                    'name' => 'NAME attribute required',
                ];
                continue;
            }

            if (! isset($formField['score'])) {
                $formBuilderJsonErrors[$key] = [
                    'score' => 'SCORE attribute required',
                ];
            }
        }

        if (! empty($formBuilderJsonErrors)) {

            return response()
                ->json([
                    'success' => false,
                    'details' => 'Error: Score or Name Attributes are not provided',
                ]);
        }

        $user = $request->user();

        $input = $request->merge(['user_id' => $user->id])->except('_token');

        DB::beginTransaction();

        // generate a random identifier
        $input['identifier'] = $user->id.'-'.Helper::randomString(20);
        $form = Form::create($input);

        try {

            // iterating each input as separate row in form_details table
            foreach (json_decode($form->form_builder_json) as $field) {

                $formDetail = new FormDetail();
                $formDetail->form_id = $form->id;
                $formDetail->data = json_encode($field);
                $formDetail->name_attribute = $field->name;
                $formDetail->score = $field->score;
                $formDetail->created_by = $user->id;

                $formDetail->save();
            }

            // dispatch the event
            event(new FormCreated($form));

            DB::commit();

            return response()
                ->json([
                    'success' => true,
                    'details' => 'Form successfully created!',
                    'dest' => route('formbuilder::forms.index'),
                ]);
        } catch (Throwable $e) {
            info($e);

            DB::rollback();

            return response()->json(['success' => false, 'details' => 'Failed to create the form.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $form = Form::where(['user_id' => $user->id, 'id' => $id])
            ->with('user')
            ->withCount('submissions')
            ->firstOrFail();

        $pageTitle = "Preview Form";

        return view('formbuilder::forms.show', compact('pageTitle', 'form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();

        $form = Form::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();

        $pageTitle = 'Edit Form';

        $saveURL = route('formbuilder::forms.update', $form);

        // get the roles to use to populate the make the 'Access' section of the form builder work
        $form_roles = Helper::getConfiguredRoles();

        return view('formbuilder::forms.edit', compact('form', 'pageTitle', 'saveURL', 'form_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  jazmy\FormBuilder\Requests\SaveFormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveFormRequest $request, $id)
    {
        $user = auth()->user();
        $form = Form::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();

        $input = $request->except('_token');

        if ($form->update($input)) {
            // dispatch the event
            event(new FormUpdated($form));

            return response()
                ->json([
                    'success' => true,
                    'details' => 'Form successfully updated!',
                    'dest' => route('formbuilder::forms.index'),
                ]);
        } else {
            response()->json(['success' => false, 'details' => 'Failed to update the form.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
        $form = Form::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();
        $form->delete();

        // dispatch the event
        event(new FormDeleted($form));

        return redirect()->back()->with('success', "Form Deleted Successfully");
    }
}
