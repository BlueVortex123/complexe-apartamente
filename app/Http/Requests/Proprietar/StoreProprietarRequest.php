<?php

namespace App\Http\Requests\Proprietar;

use Illuminate\Foundation\Http\FormRequest;

class StoreProprietarRequest extends FormRequest
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
            'nume' => 'required|string|min:3|max:255',
            'CNP' => 'required|string|unique:proprietari,CNP',
            'adresa' => 'required|string|min:4|max:255',
            'telefon' => 'required|string|min:5',
            'email' => 'required|email|min:5',
        ];
    }
}
