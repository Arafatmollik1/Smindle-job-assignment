<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HandleOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:1000'],
            'basket' => ['required', 'array', 'min:1'],
            'basket.*.name' => ['required', 'string', 'max:255'],
            'basket.*.type' => ['required', 'in:unit,subscription'], // For Smindle: I am assuming it is always 'unit' or 'subscription'
            'basket.*.price' => ['required', 'numeric', 'min:0'],
        ];
    }
}
