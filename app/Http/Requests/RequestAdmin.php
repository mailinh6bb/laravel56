<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAdmin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'unique:users,email',
            'password' => 'required|min:6|max:32',
            'rePassword' => 'required|same:password',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Bạn chưa nhập tên.',
            'phone.required' => 'Bạn chưa nhập số điện thoại.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Bạn chưa nhập Password',
            'password.min' => 'Mật khẩu phải có từ 6-32 ký tự',
            'password.max' => 'Mật khẩu phải có từ 6-32 ký tự',
            'rePassword.required' => 'Bạn nhập lại Mật Khẩu',
            'rePassword.same' => 'Mật khẩu không trùng nhau',
        ];
    }
}
