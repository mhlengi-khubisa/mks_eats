@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-7xl px-5 py-10 sm:px-8 sm:py-14">
    <section class="overflow-hidden rounded-[2rem] bg-forest px-7 py-10 text-white sm:px-12 sm:py-14">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-orange-200">Meet your local maker</p>
        <h1 class="mt-3 font-display text-4xl font-extrabold tracking-tight sm:text-5xl">{{ $vendor->store_name }}</h1>
        <p class="mt-3 text-sm font-semibold text-white/65"><span aria-hidden="true">📍</span> {{ $vendor->location ?? 'South Africa' }}</p>
        <p class="mt-5 max-w-2xl leading-7 text-white/75">{{ $vendor->description ?? 'Proud to bring local flavour and community-made favourites to Mks Eats.' }}</p>
    </section>

    <section class="mt-10">
        <div class="mb-5 flex items-end justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-citrus">Straight from the source</p>
                <h2 class="mt-2 font-display text-3xl font-extrabold text-forest">From this maker</h2>
            </div>
            <a href="{{ route('products.index') }}" class="text-sm font-bold text-forest transition hover:text-citrus">All local picks →</a>
        </div>
        @if($vendor->products->count())
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($vendor->products as $product)
                    @include('storefront.partials.product-card', ['product' => $product])
                @endforeach
            </div>
        @else
            <div class="rounded-3xl border border-dashed border-forest/20 bg-white p-8 text-center text-slate-500">New local favourites are on the way.</div>
        @endif
    </section>
</div>
@endsection
