<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LabRequest extends FormRequest
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
                "nombre" => "required|max:255",
                "jefe_id" => "required|exists:personal,id"
            ],
            "PUT" => [
                "nombre" => "required|max:255",
                "jefe_id" => "required|exists:personal,id"
            ]
        ];
        return $rules[$this->method()];
    }
}
