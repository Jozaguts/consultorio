<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentUpdateRequest extends FormRequest
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
            'cash_out_id' => 'exists:cash_outs,id',
            'date' => 'string',
            'amount' => 'min:1',
            'payment_method_id' => 'exists:payment_methods,id',
            'consulting_room_id' => 'exists:consulting_rooms,id',
        ];
    }
}
