<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title'        => 'required',
            'details'      => 'required',
            'photo'        => 'nullable|dimensions:width=1024, height=768',
            'filetitle'    => 'required_with:fileattachupload'
        ];    
    }


    public function messages(){
        return[
            'title.required'    => 'يجب إدخال عنوان الصفحة',
            'details.required'  => 'يجب إدخال تفاصيل الصفحة',
            'photo.dimensions'  => 'الصورة الرئيسية يجب أن تكون بالأبعاد التالية, عرض 1024 بيكسل وإرتفاع 768 بيكسل',
            'required_with'    => 'يجب إختيار عنوان الملف المرفق'
            
        ];
    }



}
