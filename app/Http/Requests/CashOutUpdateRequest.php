<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashOutUpdateRequest extends FormRequest
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
            'user_id' => 'numeric',
            'date' => ' date_format:Y-m-d H:i:s',
            'amount' => 'numeric',
            'cash_out_date' => 'date_format:Y-m-d H:i:s',
            'consulting_room_id' => 'numeric'
        ];
    }
}
