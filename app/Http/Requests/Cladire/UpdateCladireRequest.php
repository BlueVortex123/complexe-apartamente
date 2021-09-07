<?php

namespace App\Http\Requests\Cladire;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCladireRequest extends FormRequest
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
            'nume' => 'required|string|min:2|max:100',
            'numar_etaje' => 'required|string|min:1|max:2',
            'complex_id' => 'exists:complexe,id|required',

        ];
    }
}
