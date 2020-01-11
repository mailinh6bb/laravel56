<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
            'pro_name' => 'required',
            'pro_description' => 'required|min:3|max:200',
            'pro_content' => 'required',
            'pro_category_id' => 'required'
        ];
    }
    public function messages(){
      return [
        'pro_name.required' => 'Vui lòng nhập Tên',
        'pro_description.required' => 'Vui lòng nhập Miêu Tả',
        'pro_description.min' => 'Độ dài từ 3-200 ký tự',
        'pro_description.max' => 'Độ dài từ 3-200 ký tự',
        'pro_content.required' => 'Vui lòng nhập Nôi Dung',
        'pro_category_id.required' => ' Vui lòng chọn Loại Sản Phẩm'

    ];
}
}
