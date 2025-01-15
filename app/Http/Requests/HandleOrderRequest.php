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

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'address.required' => 'Address is required',
            'basket.required' => 'Basket is required',
            'basket.min' => 'Basket must contain at least one item',
            'basket.*.name.required' => 'Each item in the basket must have a name',
            'basket.*.type.required' => 'Each item in the basket must have a type',
            'basket.*.type.in' => 'Each item type must be either unit or subscription',
            'basket.*.price.required' => 'Each item in the basket must have a price',
            'basket.*.price.numeric' => 'Each item price must be a number',
            'basket.*.price.min' => 'Each item price must be at least 0',
        ];
    }
}
