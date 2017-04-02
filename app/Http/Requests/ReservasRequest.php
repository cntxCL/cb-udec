<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservasRequest extends FormRequest
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
                "inicio" => "required|date_format:d/m/Y H:i",
                "fin" => "required|date_format:d/m/Y H:i|after:inicio",
                "personal_id" => "required|exists:personal,id",
                "sala_id" => "required|exists:salas,id",
                "motivo_id" => "required|exists:motivo,id"
            ],
            "PUT" => [
            ]
        ];
        return $rules[$this->method()];
    }
}
