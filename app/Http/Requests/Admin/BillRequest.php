<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'consumption' => $this->consumption ? str_replace(',', '.', str_replace('.', '', $this->consumption)) : 0,
            'value' => $this->value ? str_replace(',', '.', str_replace('.', '', str_replace('R$ ', '', $this->value))) : 0,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date_ref' => 'date_format:Y-m-d',
            'consumption' => 'nullable|numeric|between:0,999999999.999',
            'value' => 'nullable|numeric|between:0,999999999.999',
            'complex_id' => 'exists:complexes,id'
        ];
    }

    public function messages()
    {
        return [
            'consumption.between' => 'O campo consumo deve ser entre 0 e 999.999.999,999.',
            'value.between' => 'O campo valor deve ser entre 0 e 999.999.999,999.',
        ];
    }
}
