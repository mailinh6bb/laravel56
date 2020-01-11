<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest
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
            'name' => 'required|unique:categories,c_name,'.$this -> id,
            'icon' => 'required'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập Tên',
            'name.unique' => 'Tên đã tồn tại',
            'icon.required' => 'Vui lòng nhập Icon',
            'icon.unique' => 'Icon đã tồn tại' 
        ];
    }
}
