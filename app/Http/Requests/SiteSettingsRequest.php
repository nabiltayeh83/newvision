<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingsRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'keywords' => 'required',
            'siteicofile' => 'nullable|dimensions:width=16, height=16',
            'logofile' => 'nullable|dimensions:width=240, height=80'
        ];
    }


    public function messages(){
        return[
            'title.required' => 'يجب إدخال عنوان الموقع',
            'description.required' => 'يجب إدخال وصف الموقع',
            'keywords.required' => 'يجب إدخال الكلمات المفتاحية',
            'siteicofile.dimensions' => 'ايقون الموقع يجب أن يكون بالأبعاد التالية 16*16 بيكسل',
            'logofile.dimensions' => 'شعار الموقع يجب أن يكون بعرض 240 بيكسل وإرتفاع 80 بيكسل'
        ];
    }



}
