<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientStoreRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'second_last_name' => 'required',
            'age' => 'required',
            'height' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'contact' => 'required',
            'contact_phone' => 'required',
            'consulting_room_id' => 'required'
        ];
    }
}
