<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalRequest extends FormRequest
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
            "rut" => "string|max:12",
            "nombre" => "alpha_spaces|max:100",
            "apellido" => "alpha_spaces|max:100",
            "cargo" => "string|max:100",
            "telefono" => "sometimes|digits_between:9,11",
            "correo" => "email"
        ];
    }
}
