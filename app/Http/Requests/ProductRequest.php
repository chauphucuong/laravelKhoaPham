<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtName' =>'required | unique:product,name',
            'fImages'=>'required| image ',
            'sltParent'=>'required ',
        ];
    }

    public function messages(){
        return [
        'sltParent.required' =>'Please Choose Category',
        'txtName.required' =>'Please Enter Name Category ',
        'txtName.unique' =>'This name category is exists',
        'fImages.required' =>'Please Choose Images',
        'fImages.image' =>'This file is image'
        ];
    }
}
