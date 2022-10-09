<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptRequset extends FormRequest
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
            'name'=> 'required|string|max:100',
            'phone'=> ['required','min:9','max:9','regex:/^((71)|(73)|(77)|(70))[0-9]{7}/'],
            'email' => 'required|email',
            'address'=>'required|string|max:100',
            'message'=>'required|string|max:127',
        ];
    }

    public function messages(){

        return [
            'required'  => 'هذا الحقل مطلوب ',
            'max'  => 'هذا الحقل طويل',
            'regex'=>' يجب ان يكون ارقام',
            'email'=>'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صالحًا.',
        ];
    }
}
