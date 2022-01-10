<?php

namespace App\Services;


class CrudService
{
    public function save($request, $modelName)
    {
        try {
            $data = $request->except('_token');
            $model = $this->returnModel($modelName);
            $model::create($data);
            return response()->json(['flag' => true]);
        } catch (\Exception $e) {
            return response()->json(['flag' => false]);
        }

    }

    public function delete($id, $modelName)
    {
        try {

            $model = $this->returnModel($modelName);
            $model::find($id)->delete();
            return response()->json(['flag' => true]);
        } catch (\Exception $e) {
            return response()->json(['flag' => false]);
        }

    }

    public function returnModel($modelName)
    {
        $modelName = '\App' . '\Models' . '\\' . $modelName;
        $model = app($modelName);
        return $model;
    }

    public function update($id,$request,$modelName)
    {
        dd($id,$request,$modelName);
        try {
            $data = $request->except('_token');
            $model = $this->returnModel($modelName);
            $model::find($id)->update($data);
            return response()->json(['flag' => true]);
        } catch (\Exception $e) {
            return response()->json(['flag' => false]);
        }

    }

    public function getData($modelName)
    {
        $model = $this->returnModel($modelName);
        $data =  $model->all();
        return response()->json(['data' => $data]);
    }

    public function getSubcategories($id)
    {

        $data =  SubCategory::where('category_id',$id)->get();
        return response()->json(['data' => $data]);
    }



}
