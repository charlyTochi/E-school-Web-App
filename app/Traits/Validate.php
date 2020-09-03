<?php

namespace App\Traits;
use Illuminate\Support\Facades\Validator;

trait Validate {
    public function validator($rules, $request){
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                  'message' => 'All fields are required'
                ]);
        }
    }
}