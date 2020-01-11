<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestArticle extends FormRequest
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
            'a_name' => 'required|unique:articles,a_name,'.$this -> id,
            'a_description' => 'required',
            'a_content' => 'required'
        ];
    }
    public function messages(){
        return [
            'a_name.required' => 'Vui lòng nhập Tên',
            'a_name.unique' => 'Tên đã tồn tại',
            'a_description.required' => 'Vui lòng nhập Mô Tả',
            'a_content.required' => 'Vui lòng nhập Nội Dung'
        ];
    }
}
