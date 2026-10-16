@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12">
    <div class="rounded-2xl bg-emerald-50 border border-emerald-200 p-8 text-center">
        <h1 class="text-3xl font-bold text-emerald-900">Payment successful</h1>
        <p class="mt-3 text-emerald-700">Your order {{ $order->number ?? 'reference' }} has been received.</p>
        <a href="{{ url('/') }}" class="mt-6 inline-block rounded bg-emerald-700 px-5 py-3 font-semibold text-white">Return home</a>
    </div>
</div>
@endsection
