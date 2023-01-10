<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ComplexRequest extends FormRequest
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
            'name' => 'required|max:191',
            'document_company' => 'nullable|max:50',
            'email' => 'nullable|max:191',
            'telephone' => 'nullable|max:50',
            'cell' => 'nullable|max:50',
            'zipcode' => 'nullable|max:10',
            'street' => 'nullable|max:191',
            'number' => 'nullable|max:191',
            'complement' => 'nullable|max:191',
            'neighborhood' => 'nullable|max:191',
            'state' => 'nullable|min:2|max:2',
            'city' => 'nullable|max:191',
            'status' => 'nullable|in:Ativo,Inativo'
        ];
    }
}
