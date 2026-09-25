<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasVerifiedEmail() ?? false;
    }

    public function rules(): array
    {
        return [
            'description' => ['required', 'string', 'max:1000'],
            'price' => ['required', 'integer', 'min:0'],
        ];
    }
}
