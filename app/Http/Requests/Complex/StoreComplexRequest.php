<?php

namespace App\Http\Requests\Complex;

use Illuminate\Foundation\Http\FormRequest;

class StoreComplexRequest extends FormRequest
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
            'adresa' => 'required|string|min:3|max:255',
        ];
    }
}
