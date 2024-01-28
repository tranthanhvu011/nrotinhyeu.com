<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassword2Request extends FormRequest
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
            'current_password' => 'required',
            'old_password2' => 'required',
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => _('Bạn chưa nhập mật khẩu hiện tại'),
            'old_password2.required' => _('Bạn chưa nhập mật khẩu cấp 2 hiện tại'),
            'password.required' => _('Bạn chưa nhập mật khẩu cấp 2 mới'),
            'password.confirmed' => _('Nhập lại mật khẩu cấp 2 mới không chính xác')
        ];
    }
}
