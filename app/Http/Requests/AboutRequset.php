<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequset extends FormRequest
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
            'vision_details'=>'required|string|max:100',
            'objectives_details'=>'required|string|max:100',
            'Aboutus_details'=>'required|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'required'=>'هذا الحقل مطلوب',
            'vision_details.max'=>'يجب ان لايزيد عن 100 حرفا',
            'objectives_details.max'=>'يجب ان لايزيد عن 100 حرفا',
            'Aboutus_details.max'=>'يجب ان لايزيد عن 100 حرفا',
            'string'=>'الاسم يجب ان يكون احرف',
        ];
    }
}
