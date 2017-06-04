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
            "rut" => "required|string|max:12|regex:/^(\d{1,3}(\.?\d{3}){2})\-?([\dkK])$/|unique:personal,rut,".$this->segment(2),
            "nombre" => "required|alpha_spaces|max:100",
            "apellido" => "required|alpha_spaces|max:100",
            "cargo" => "string|max:100",
            "telefono" => "sometimes|numeric|digits_between:9,11",
            "correo" => "email",
            "cv" => "mimes:pdf,doc,docx"
        ];
    }
}
