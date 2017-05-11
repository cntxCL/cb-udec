<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratosRequest extends FormRequest
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
                "inicio" => "required|date_format:d/m/Y",
                "fin" => "required|date_format:d/m/Y|after:inicio",
                "personal_id" => "required|exists:personal,id",
                "proyecto_id" => "required|exists:proyectos,id",
                "laboratorio_id" => "required|exists:laboratorios,id",
            ],
            "PUT" => [
                "inicio" => "required|date_format:d/m/Y",
                "fin" => "required|date_format:d/m/Y|after:inicio",
                "personal_id" => "required|exists:personal,id",
                "proyecto_id" => "required|exists:proyectos,id",
                "laboratorio_id" => "required|exists:laboratorios,id",
            ]
        ];
        return $rules[$this->method()];
    }
}
