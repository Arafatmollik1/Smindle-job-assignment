<?php

namespace App\Http\Controllers;

use App\DTO\SmindleOrderDTO;
use App\Http\Requests\HandleOrderRequest;
use App\Models\SmindleOrder;
use Exception;
use Illuminate\Support\Facades\Log;
use TypeError;

class OrderController extends Controller
{
    public function __invoke(HandleOrderRequest $request)
    {
        try {
            $validated = $request->validated();

            $orderDTO = new SmindleOrderDTO($validated);

            $order = SmindleOrder::create($orderDTO->toOrderArray());

            $order->basket()->createMany($orderDTO->toBasketArray());

            return response()->json(['message' => 'Order has been placed successfully']);

        } catch (TypeError $e) {
            Log::debug($e->getMessage());

            return response()->json(['error' => 'Invalid data type provided, please check your input'], 400);
        } catch (Exception $e) {
            Log::debug($e->getMessage());

            return response()->json(['error' => 'Order creation failed, please try again later'], 500);
        }
    }
}
