<?php

namespace App\Http\Controllers;

use App\Http\Requests\HandleOrderRequest;

class OrderController extends Controller
{
    public function __invoke(HandleOrderRequest $request)
    {
        $validated = $request->validated();
        return response()->json(['message' => 'Order has been validate successfully']);

    }
}
