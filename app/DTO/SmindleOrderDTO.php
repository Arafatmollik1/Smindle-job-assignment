<?php

namespace App\DTO;

class SmindleOrderDTO
{
    public string $first_name;
    public string $last_name;
    public string $address;
    public array $basket;

    public function __construct(array $validatedData)
    {
        $this->first_name = $validatedData['first_name'];
        $this->last_name = $validatedData['last_name'];
        $this->address = $validatedData['address'];
        $this->basket = $validatedData['basket'];
    }

    public function toOrderArray(): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
        ];
    }


    public function toBasketArray(): array
    {
        return $this->basket;
    }
}
