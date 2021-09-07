<?php

namespace App\Http\Requests\Apartament;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartamentRequest extends FormRequest
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
            'etaj' => 'required|min:1|max:2',
            'numar' => 'required|min:1|max:100|unique:apartamente,numar', 
            'suprafata' => 'required',
            'numar_camere' => 'required|min:1|max:3',
            'proprietari_id' => 'exists:proprietari,id|nullable',
            'cladiri_id' => 'exists:cladiri,id|required'
        ];
    }
}
