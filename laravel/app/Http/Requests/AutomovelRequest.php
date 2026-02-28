<?php

namespace App\Http\Requests;

use App\Rules\PlacaValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AutomovelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'placa' => ['required', 'string', new PlacaValidation, Rule::unique('automoveis', 'placa')->ignore($this->route('automovel'))],
            'chassi' => ['required', 'string', 'max:255', Rule::unique('automoveis', 'chassi')->ignore($this->route('automovel'))],
            'montadora_id' => 'required|exists:montadoras,id',
        ];
    }
    public function messages(): array
    {
        return [
            'placa.unique' => 'A placa já existe',
            'chassi.unique' => 'O chassi já existe',
        ];
    }
}
