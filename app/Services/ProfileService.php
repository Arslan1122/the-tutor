<?php

namespace App\Services;


use App\Models\User;
use App\Models\UserCourse;
use App\Models\UserStandard;
use App\Models\UserSubject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProfileService
{


    public function returnModel($modelName)
    {
        $modelName = '\App' . '\Models' . '\\' . $modelName;

        $model = app($modelName);
        return $model;
    }

    public function updateOrCreate($id, $request, $modelName)
    {
        try {
            DB::beginTransaction();

            $model = $this->returnModel($modelName);

            if ($request->profile_img) {
                if ($request->old_image) {
                    unlink($request->old_image);
                }

                $profieImg = $request->profile_img;
                $ImgnewName = time() . '.' . $profieImg->getClientOriginalExtension();
                $path = '/uploads/Teacher/profileImg';
                $profileImg = Image::make($profieImg->getRealPath());
                $profileImg->save(public_path($path) . '/' . $ImgnewName);
                $model::updateOrCreate(['user_id' => $id], ['profile_img' => $path . '/' . $ImgnewName]);
            }

            if ($request->intro_clip) {
                if ($request->old_clip) {
                    unlink($request->old_clip);
                }
                $IntroClip = $request->intro_clip;
                $newClip = time() . '.' . $IntroClip->getClientOriginalExtension();
                $path = '/uploads/Teacher/introClip';

                $IntroClip->move(public_path($path) . '/', $newClip);
                $model::updateOrCreate(['user_id' => $id], ['intro_clip' => $path . '/' . $newClip]);
            }

            $data = $request->except(['_token', 'intro_clip', 'old_clip', 'profile_img', 'old_image', 'standards', 'courses', 'subjects']);
            $model::updateOrCreate(['user_id' => $id], $data);

            if (!empty($request->standards) && sizeof($request->standards) > 0) {
                UserStandard::where('user_id', Auth::id())->delete();
                foreach ($request->standards as $sId) {
                    UserStandard::create([
                        'user_id' => Auth::id(),
                        'standard_id' => $sId,
                    ]);
                }
            }

            if (!empty($request->courses) && sizeof($request->courses) > 0) {
                UserCourse::where('user_id', Auth::id())->delete();
                foreach ($request->courses as $cId) {
                    UserCourse::create([
                        'user_id' => Auth::id(),
                        'course_id' => $cId,
                    ]);
                }
            }


            if (!empty($request->subjects) && sizeof($request->subjects) > 0) {
                UserSubject::where('user_id', Auth::id())->delete();
                foreach ($request->subjects as $suId) {
                    UserSubject::create([
                        'user_id' => Auth::id(),
                        'subject_id' => $suId,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['flag' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['flag' => false]);
        }

    }

    public function studentUpdateOrCreate($id, $request, $modelName)
    {
        try {
            DB::beginTransaction();

            $model = $this->returnModel($modelName);

            if ($request->profile_img) {
                if ($request->old_image) {
                    unlink($request->old_image);
                }

                $profieImg = $request->profile_img;
                $ImgnewName = time() . '.' . $profieImg->getClientOriginalExtension();
                $path = '/uploads/Student/profileImg';
                $profileImg = Image::make($profieImg->getRealPath());
                $profileImg->save(public_path($path) . '/' . $ImgnewName);
                $model::updateOrCreate(['user_id' => $id], ['profile_img' => $path . '/' . $ImgnewName]);
            }

            if ($request->intro_clip) {
                if ($request->old_clip) {
                    unlink($request->old_clip);
                }
                $IntroClip = $request->intro_clip;
                $newClip = time() . '.' . $IntroClip->getClientOriginalExtension();
                $path = '/uploads/Student/introClip';

                $IntroClip->move(public_path($path) . '/', $newClip);
                $model::updateOrCreate(['user_id' => $id], ['intro_clip' => $path . '/' . $newClip]);
            }

            $data = $request->except(['_token', 'intro_clip', 'old_clip', 'profile_img', 'old_image', 'standards', 'courses', 'subjects']);
            $model::updateOrCreate(['user_id' => $id], $data);

            if (!empty($request->standards) && sizeof($request->standards) > 0) {
                UserStandard::where('user_id', Auth::id())->delete();
                foreach ($request->standards as $sId) {
                    UserStandard::create([
                        'user_id' => Auth::id(),
                        'standard_id' => $sId,
                    ]);
                }
            }

            if (!empty($request->courses) && sizeof($request->courses) > 0) {
                UserCourse::where('user_id', Auth::id())->delete();
                foreach ($request->courses as $cId) {
                    UserCourse::create([
                        'user_id' => Auth::id(),
                        'course_id' => $cId,
                    ]);
                }
            }


            if (!empty($request->subjects) && sizeof($request->subjects) > 0) {
                UserSubject::where('user_id', Auth::id())->delete();
                foreach ($request->subjects as $suId) {
                    UserSubject::create([
                        'user_id' => Auth::id(),
                        'subject_id' => $suId,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['flag' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['flag' => false]);
        }


    }


}
