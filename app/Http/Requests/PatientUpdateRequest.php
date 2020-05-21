<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientUpdateRequest extends FormRequest
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
            'first_name' => 'string|min:4',
            'last_name' => ' string',
            'second_last_name' => 'string ',
            'age' => 'min:1',
            'height' => ' min:1',
            'address' => 'string',
            'phone' => 'min:10',
            'contact' => 'string',
            'contact_phone' => 'min:10',
            'consulting_room_id' => 'required'
        ];
    }
}
