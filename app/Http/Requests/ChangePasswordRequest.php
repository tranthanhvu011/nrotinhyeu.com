<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'old_password' => 'required',
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
            'old_password.required' => _('Bạn chưa nhập mật khẩu hiện tại'),
            'password.required' => _('Bạn chưa nhập mât khẩu mới'),
            'password.confirmed' => _('Nhập lại mật khẩu không chính xác')
        ];
    }
}
