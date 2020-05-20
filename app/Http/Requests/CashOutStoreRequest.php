<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashOutStoreRequest extends FormRequest
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
            'user_id' => 'numeric|required', 
            'date' => 'required|date_format:d-m-Y H:i:s', 
            'amount' => 'required|numeric', 
            'cash_out_date' => 'required|date_format:d-m-Y H:i:s', 
            'consulting_room_id' => 'required|numeric|'
        ];
    }
}
