<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
                "sala_id" => "required|exists:salas,id",
                "motivo_id" => "required|exists:motivo,id"
            ],
            "PUT" => [
                "inicio" => "required|date_format:d/m/Y",
                "fin" => "required|date_format:d/m/Y|after:inicio",
                "personal_id" => "required|exists:personal,id",
                "sala_id" => "required|exists:proyectos,id",
                "motivo_id" => "required|exists:motivo,id",
            ]
        ];
        return $rules[$this->method()];
    }
}
