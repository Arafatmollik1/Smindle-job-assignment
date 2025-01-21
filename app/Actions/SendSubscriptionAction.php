<?php

namespace App\Actions;

use App\Jobs\TestRabbitMqJob;

class SendSubscriptionAction
{
    public function execute(array $basketItems): void
    {
        foreach ($basketItems as $item) {
            if ($item['type'] === 'subscription') {
                TestRabbitMqJob::dispatch($item);
            }
        }
    }
}
