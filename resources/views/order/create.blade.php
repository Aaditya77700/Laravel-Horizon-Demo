@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">Place an Order</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form action="{{ route('order.store') }}" method="POST">
        @csrf

        <div class="mb-4">
    <label class="block font-bold mb-1">Email</label>
    <input type="email" name="email" required class="w-full border px-3 py-2 rounded">
</div>

        @foreach($products as $product)
            <div class="flex items-center justify-between mb-3">
                <div>
                    <strong>{{ $product->name }}</strong><br>
                    <span class="text-sm text-gray-600">${{ $product->price }}</span>
                </div>
                <input type="number" name="products[{{ $loop->index }}][quantity]"
                       class="border px-2 py-1 w-20"
                       placeholder="0" min="0">
                <input type="hidden" name="products[{{ $loop->index }}][id]" value="{{ $product->id }}">
            </div>
        @endforeach

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Submit Order
        </button>
    </form>
</div>
@endsection
