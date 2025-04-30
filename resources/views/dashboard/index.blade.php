@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow rounded">
    <h2 class="text-2xl font-bold mb-4">Orders Dashboard</h2>

    @foreach ($orders as $order)
        <div class="border-b py-4">
            <div class="font-semibold">Order #{{ $order->id }}</div>
            <div>Status: <span class="text-blue-600">{{ $order->status }}</span></div>
            <div>Total: ${{ $order->total_amount }}</div>
            <ul class="list-disc pl-6 mt-2">
                @foreach ($order->items as $item)
                    <li>{{ $item->product->name }} — {{ $item->quantity }} × ${{ $item->price }}</li>
                @endforeach
            </ul>

            @if($order->invoice)
                <div class="mt-2 text-green-600">
                    Invoice: <a href="{{ Storage::url($order->invoice->file_path) }}" target="_blank" class="underline">View</a>
                </div>
            @endif
        </div>
    @endforeach
</div>
@endsection
