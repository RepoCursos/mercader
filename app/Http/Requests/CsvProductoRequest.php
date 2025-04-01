<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CsvProductoRequest extends FormRequest
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
        /** validamos que el campo para importar el archivo sea de tipo csv */
        return [
            'document_csv' => ['required', 'mimes:csv']
        ];
    }
}
