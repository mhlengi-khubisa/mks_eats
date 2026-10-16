@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">Admin Dashboard</h1>
        <p class="mt-2 text-slate-600">Mks Eats performance overview</p>
    </div>
    <div class="grid gap-4 md:grid-cols-4">
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Vendors</p>
            <p class="mt-3 text-3xl font-bold text-slate-900">{{ $stats['vendors'] }}</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Products</p>
            <p class="mt-3 text-3xl font-bold text-slate-900">{{ $stats['products'] }}</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Orders</p>
            <p class="mt-3 text-3xl font-bold text-slate-900">{{ $stats['orders'] }}</p>
        </div>
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Revenue</p>
            <p class="mt-3 text-3xl font-bold text-emerald-700">R{{ number_format($stats['revenue'], 2) }}</p>
        </div>
    </div>
    <div class="mt-8 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <h2 class="text-xl font-bold text-slate-900">Recent orders</h2>

        @if($recentOrders->count())
            <div class="mt-4 overflow-hidden rounded-xl border border-slate-200">
                <table class="min-w-full divide-y divide-slate-200 text-left">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-4 py-3 text-sm font-semibold text-slate-600">Order</th>
                            <th class="px-4 py-3 text-sm font-semibold text-slate-600">Customer</th>
                            <th class="px-4 py-3 text-sm font-semibold text-slate-600">Vendor</th>
                            <th class="px-4 py-3 text-sm font-semibold text-slate-600">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach($recentOrders as $order)
                            <tr>
                                <td class="px-4 py-3 text-sm text-slate-700">{{ $order->number }}</td>
                                <td class="px-4 py-3 text-sm text-slate-700">{{ $order->customer?->name ?? 'Customer' }}</td>
                                <td class="px-4 py-3 text-sm text-slate-700">{{ $order->vendor?->store_name ?? 'Vendor' }}</td>
                                <td class="px-4 py-3 text-sm font-semibold text-emerald-700">R{{ number_format($order->grand_total, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="mt-4 text-sm text-slate-500">No orders yet. Once customers place orders, they will appear here.</p>
        @endif
    </div>
</div>
@endsection
