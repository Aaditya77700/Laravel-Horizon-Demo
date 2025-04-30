<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Order $order) {}

    public function build()
    {
        $mail = $this->subject("Order #{$this->order->id} Confirmation")
                     ->markdown('emails.order.confirmation', ['order' => $this->order]);

        

        return $mail;
    }
}
