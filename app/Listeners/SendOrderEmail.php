<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreatedMail;
use App\Events\OrderCreated;


class SendOrderEmail implements ShouldQueue
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
    public function handle(OrderCreated $event)
    {
             // Accesăm comanda din eveniment
             $order = $event->order;

             // Verificăm dacă comanda este validă
             if (!$order) {
                 \Log::error('Comanda este null în SendOrderEmail.');
                 return;
             }
             try {
                Mail::to('gabriel.basca@yahoo.com')->send(new OrderCreatedMail($order));
            } catch (\Exception $e) {
                \Log::error('Failed to send order email.', ['error' => $e->getMessage()]);
            }
             
    }
}
