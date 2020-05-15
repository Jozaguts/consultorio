<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultorioStoreRequest extends FormRequest
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
            'name'=> 'required|unique:consultorios|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|min:10|max:10',
            'responsable' => 'required|max:255',
            'logo' => 'required',
            'licence' => 'string|max:25|unique:consultorios',
            'web' => 'string|url',
            'twitter' => 'string',
            'facebook' => 'string',
            'instagram' => 'string',
        ];
        
    }    
}
