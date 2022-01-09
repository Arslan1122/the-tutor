<?php

namespace App\Services;


use App\Models\User;
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

    public function updateOrCreate($id,$request,$modelName,$prefix)
    {

        try {
            DB::beginTransaction();

            $name=str_replace(' ','',$request->first_name).' '.str_replace(' ','',$request->last_name);
            $model = $this->returnModel($prefix.$modelName);
            if($request->profile_img){
                if($request->old_image){
                unlink($request->old_image);
                }
                $profieImg=$request->profile_img;
                $ImgnewName=time().$request->first_name.'.'.$profieImg->getClientOriginalExtension();
                $path='/uploads/'.$prefix.'/profileImg';
                $profileImg=Image::make($profieImg->getRealPath());
                $profileImg->save(public_path($path).'/'.$ImgnewName);
                $model::updateOrCreate(['user_id'=>$id],['profile_img'=>$path.'/'.$ImgnewName]);
            }
            if($request->intro_clip){
                if($request->old_clip){
                    unlink($request->old_clip);
                }
                $IntroClip=$request->intro_clip;
                $newClip=time().$request->first_name.'.'.$IntroClip->getClientOriginalExtension();
                $path='/uploads/'.$prefix.'/introClip';

                $IntroClip->move(public_path($path).'/',$newClip);
                $model::updateOrCreate(['user_id'=>$id],['intro_clip'=>$path.'/'.$newClip]);
            }

            User::updateOrCreate(['id'=>$id],['name'=>$name]);
            $data = $request->except(['_token','intro_clip','old_clip','profile_img','old_image','first_name','last_name']);
            $model::updateOrCreate(['user_id'=>$id],$data);
            DB::commit();
            return response()->json(['flag' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return response()->json(['flag' => false]);
        }

    }




}
