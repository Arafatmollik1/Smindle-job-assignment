<?php

namespace App\Actions;

use App\Jobs\SendSubscriptionToApi;

class SendSubscriptionAction
{
    public function execute(array $basketItems): void
    {
        foreach ($basketItems as $item) {
            if ($item['type'] === 'subscription') {
                SendSubscriptionToApi::dispatch($item['name'], $item['price']);
            }
        }
    }
}
