<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'companyname'   =>  'required',
            'fullname'      =>  'required',
            'email'         =>  'required|email',
            'phone'         =>  'required',
            'details'       =>  'required'
        ];
    }


    public function messages(){
        return [
            'companyname.required'   =>  'يجب إدخال إسم المؤسسة',
            'fullname.required'      =>  'يجب إدخال الإسم كاملاً',
            'email.required'         =>  'يجب إدخال البريد الإلكتروني',
            'email.email'         =>  'يجب إدخال البريد الإلكتروني بشكل صحيح',
            'phone.required'         =>  'يجب إدخال الهاتف',
            'details.required'       =>  'يجب إدخال تفاصيل الطلب',
        ];
        
    }


}
