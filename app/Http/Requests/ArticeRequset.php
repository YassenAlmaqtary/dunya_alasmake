<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticeRequset extends FormRequest
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
            'title'=>'required|string|max:50',
            'article_details'=>'required|string|max:100',
            'image'=> 'mimes:jpg,jpeg,png,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'required'=>'هذا الحقل مطلوب',
            'article_details.max'=>'تجاوزت الحد المسموح من الكتابة',
            'string'=>'الاسم يجب ان يكون احرف',

        ];
    }
}
