<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailSubscriptRequest extends FormRequest
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
            
            'email' => 'required|email',
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

