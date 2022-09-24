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
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image'=> 'required_without:id|mimes:jpg,jpeg,png,svg',
            'name'=> 'required|string|max:100',
            'category_id'=>'required',
            'price'=>'required|Integer|regex:/^\d+(\.\d{1,2})?$/',
            'details'=>'nullable|string|max:197',
            'discount_price'=>'Integer|regex:/^\d+(\.\d{1,2})?$/',
            
        ];
    }
  
    public function messages()
    {
        return [
            'required'=>'هذا الحقل مطلوب',
            'details.max'=>'يجب ان لايزيد عن 197 حرفا',
            'string'=>'الاسم يجب ان يكون احرف',
            'unique'=>'موجود من قبل',
            'required_without'=>'يجب ادخال الصورة',
            'regex'=>'يجب ان يكون حروف',
            'Integer'=>'يجب ان يكون ارقام'

        ];
    }

}
