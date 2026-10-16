@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12">
    <div class="rounded-2xl bg-amber-50 border border-amber-200 p-8 text-center">
        <h1 class="text-3xl font-bold text-amber-900">Payment cancelled</h1>
        <p class="mt-3 text-amber-700">Your payment was cancelled. You can try again any time.</p>
        <a href="{{ url('/') }}" class="mt-6 inline-block rounded bg-amber-700 px-5 py-3 font-semibold text-white">Back to shop</a>
    </div>
</div>
@endsection
