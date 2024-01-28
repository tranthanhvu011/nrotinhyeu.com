<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => 'required|max:255|unique:forum_posts,title',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => _('Bạn chưa nhập tiêu đề'),
            'title.unique' => _('Tiêu đề bạn nhập đã tồn tại'),
            'title.max' => _('Độ dài tiêu đề tối đa 255 ký tự'),
            'content.required' => _('Bạn chưa nhập nội dung')
        ];
    }
}
