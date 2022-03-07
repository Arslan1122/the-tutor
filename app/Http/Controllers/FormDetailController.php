<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormDetailRequest;
use App\Http\Requests\UpdateFormDetailRequest;
use App\Models\FormDetail;

class FormDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormDetail  $formDetail
     * @return \Illuminate\Http\Response
     */
    public function show(FormDetail $formDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormDetail  $formDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(FormDetail $formDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormDetailRequest  $request
     * @param  \App\Models\FormDetail  $formDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormDetailRequest $request, FormDetail $formDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormDetail  $formDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormDetail $formDetail)
    {
        //
    }
}
