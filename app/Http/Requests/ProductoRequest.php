<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class ProductoRequest extends FormRequest
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
            'urlfoto' => [File::image()->max(10 * 1024)->dimensions(Rule::dimensions()
                ->maxWidth(650)
                ->maxHeight(650))],
            'name' => ['required'],
            'price' => ['required', 'decimal:2'],
            'stock' => ['required', 'numeric'],
            'categoria_id' => ['required'],
        ];
    }
}
