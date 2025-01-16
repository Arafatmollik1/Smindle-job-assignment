<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendSubscriptionToApi implements ShouldQueue
{
    use Queueable;


    public function __construct(protected string $productName, protected float $price)
    {
    }

    public function handle(): void
    {
        $url = config('services.third_party_api.url');
        try {
            $payload = [
                'ProductName' => $this->productName,
                'Price' => $this->price,
                'Timestamp' => Carbon::now()->toDateTimeString(),
            ];

            $response = Http::post($url, $payload);

            if ($response->successful()) {
                Log::debug("Subscription for {$this->productName} has been successfully sent.");
            } else {
                Log::debug("Failed to send subscription for {$this->productName}. API response: {$response->body()}");
            }
        } catch (\Exception $e) {
            // For Smindle, Since https://very-slow-api.com/orders is an invalid third party api, it always throws an exception
            Log::debug("Error sending subscription to third-party API: " . $e->getMessage());
        }
    }
}
