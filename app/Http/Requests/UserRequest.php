<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'passwordunc' => 'nullable | min:6'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'يجب إدخال الإسم',
            'email.required' => 'يجب إدخال البريد الإلكتروني',
            'passwordunc.min' => 'الحد الأدني لكلمة المرور 6 احرف'
        ];
    }


}
