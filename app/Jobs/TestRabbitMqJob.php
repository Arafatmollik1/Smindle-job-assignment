<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class TestRabbitMqJob implements ShouldQueue
{
    use Queueable, InteractsWithQueue, SerializesModels;

    public function __construct(protected array $data){
        $this->connection = 'rabbitmq';
    }

    public function handle(): void
    {
        //Log::info("Processing RabbitMQ job: " . json_encode($this->data));
    }
}
