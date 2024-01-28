<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => [
                'required',
                'max:30',
                'string',
                'unique:account,username',
                'regex:/^[a-zA-Z0-9]+$/u'
            ],
            'password' => [
                'required',
                // 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                'confirmed'
            ]
        ];
    }

    public function messages()
    {
        return [
            'username.unique' => _('Tên tài khoản đã tồn tại'),
            'username.required' => _('Bạn chưa nhập tên tài khoản'),
            'username.regex' => _('Tên đăng nhập không được chứa khoảng trắng và ký tự đặc biệt'),
            'username.max' => _('Tên đăng nhập có độ dài tối đa là 30 ký tự'),
            'password.required' => _('Bạn chưa nhập mật khẩu'),
            'password.confirmed' => _('Mật khẩu nhập lại không trùng khớp')
        ];
    }
}
