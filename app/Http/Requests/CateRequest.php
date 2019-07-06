<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'txtCateName' =>'required | unique:category,name',
            'txtOrder'=>'required',
            'txtKeyWord'=>'required',
            'txtDescription'=>'required',
        ];
    }
    public function messages(){
        return [
        'txtCateName.required' =>'Please Enter Name Category',
        'txtCateName.unique' =>'This name category is exists',
        'txtOrder.required' =>'Please Enter Order',
        'txtDescription.required' =>'Please Enter Description',
        'txtKeyWord.required' =>'Please Enter KeyWord'
        ];
    }
}
