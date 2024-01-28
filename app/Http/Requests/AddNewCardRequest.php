<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewCardRequest extends FormRequest
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
            'card_type' => 'required',
            'card_amount' => 'required',
            'serial' => 'required',
            'pin' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'card_type.required' => _('Bạn chưa chọn loại thẻ'),
            'card_amount.required' => _('Bạn chưa chọn mệnh giá'),
            'serial.required' => _('Bạn chưa nhập số serial'),
            'pin.required' => _('Bạn chưa nhập mã thẻ'),
        ];
    }
}
