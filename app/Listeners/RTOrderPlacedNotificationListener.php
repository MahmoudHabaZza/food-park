<?php

namespace App\Listeners;

use App\Events\RTOrderPlacedNotificationEvent;
use App\Models\OrderPlacedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RTOrderPlacedNotificationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RTOrderPlacedNotificationEvent $event): void
    {
        OrderPlacedNotification::create([
            'message' => $event->message,
            'order_id' => $event->orderId
        ]);
    }
}
