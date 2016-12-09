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
        $rules = [
            "POST" => [
                "nombre" => "required",
                "apellido" => "required",
                "correo" => "required|email",
                "cargo" ="required|integer",
                "telefono" => "required|between:9,11" 
            ],
            "PUT" => [
                "nombre" => "required",
                "apellido" => "required",
                "correo" => "required|email",
                "cargo" ="required|integer",
                "telefono" => "required|between:9,11" 
            ],
            "DELETE" => []
        ]
        return $rules[$this->method()];
    }
}
