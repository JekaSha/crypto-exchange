<?php

namespace App\Events;

use App\Models\Order;

use Illuminate\Support\Facades\Log;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;

        Log::info("Event Order Created");
    }
}
