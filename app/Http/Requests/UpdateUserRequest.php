<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
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
            // 'username'  => 'required|string|regex:/\w*$/|max:255|unique:users,username',
            'name'  => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'role_id' => 'required|numeric',
            'password' => [
                'nullable',
                'min:6',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ]
        ];
    }

    public function messages(): array
    {
        return [
            
        ];
    }

    public function attributes()
    {
        return [
            'phone' => __('user.phone'),
            'email' => __('user.email'),
            'name' => __('user.name'),
            'role_id' => __('user.role'),
        ];
    }

    protected function prepareForValidation()
    {
        if(!$this->has('role_id')){
            $user = Auth::user();
            $this->merge([
                'role_id' => $user->role_id
            ]);
        }
    }
}
