<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'projectname'  => 'required',
            'customername' => 'required',
            'category_id'  => 'required',
            'imagefile'    => 'nullable|dimensions:width=1024,height=768',
            'filetitle'    => 'required_with:fileattachupload',

        ];
    }



    public function messages(){
        return [
            'projectname.required'  => 'يجب إدخال إسم المشروع',
            'customername.required' => 'يجب إدخال إسم العميل',
            'category_id.required'  => 'يجب إدخال التصنيف',
            'required_with' => 'يجب إدخال عنوان للملف المرفق',
            'imagefile.dimensions' => 'الصورة الرئيسية يجب أن تكون بالأبعاد التالية, عرض 1024 بيكسل وإرتفاع 768 بيكسل',

        ];
    }



}
