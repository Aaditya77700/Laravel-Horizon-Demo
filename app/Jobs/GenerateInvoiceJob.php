<?php

namespace App\Jobs;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;

class GenerateInvoiceJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    public function __construct(public Order $order) {}

    public function handle(): void
    {
        $content = "Invoice for Order #{$this->order->id}\n";
        foreach ($this->order->items as $item) {
            $content .= "- {$item->product->name} x {$item->quantity} = $" . ($item->price * $item->quantity) . "\n";
        }
        $content .= "Total: {$this->order->total_amount}";

        // $filePath = "invoices/order_{$this->order->id}.txt";
        // Storage::put($filePath, $content);

        // Invoice::create([
        //     'order_id' => $this->order->id,
        //     'file_path' => $filePath,
        // ]);
    }
}

