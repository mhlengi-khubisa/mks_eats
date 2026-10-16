@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-6xl px-5 py-10 sm:px-8 sm:py-14">
    <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-forest/60 transition hover:text-citrus"><span aria-hidden="true">←</span> Back to the good stuff</a>
    <article class="mt-6 grid overflow-hidden rounded-[2rem] border border-forest/10 bg-white shadow-card md:grid-cols-2">
        <div class="min-h-[320px] bg-orange-50 md:min-h-[580px]">
            @include('storefront.partials.product-image', ['product' => $product, 'imageClass' => 'h-full min-h-[320px] w-full object-cover md:min-h-[580px]'])
        </div>
        <div class="flex flex-col justify-center p-7 sm:p-10 lg:p-14">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-citrus">{{ $product->category->name ?? 'Local favourite' }}</p>
            <h1 class="mt-3 font-display text-3xl font-extrabold leading-tight tracking-tight text-forest sm:text-4xl">{{ $product->name }}</h1>
            <p class="mt-3 text-sm font-semibold text-forest/50">Made with care by {{ $product->vendor->store_name ?? 'a local maker' }}</p>
            <div class="mt-7 flex items-baseline gap-3">
                <span class="font-display text-3xl font-extrabold text-forest">R{{ number_format($product->price, 2) }}</span>
                @if($product->compare_at_price)
                    <span class="text-lg text-slate-400 line-through">R{{ number_format($product->compare_at_price, 2) }}</span>
                @endif
            </div>
            <div class="my-7 h-px bg-forest/10"></div>
            <h2 class="font-display text-lg font-extrabold text-forest">A little about it</h2>
            <p class="mt-3 leading-7 text-slate-600">{{ $product->description ?? 'A locally made favourite, ready to find its way to you.' }}</p>
            <div class="mt-8 rounded-2xl bg-cream p-4 text-sm text-forest/70">
                <span class="mr-2 text-lg" aria-hidden="true">📍</span> A purchase that keeps it local.
            </div>
            <a href="{{ route('products.index') }}" class="mt-6 inline-flex w-fit items-center gap-2 rounded-full bg-citrus px-6 py-3.5 text-sm font-bold text-white transition hover:bg-orange-500">Explore more local picks <span aria-hidden="true">→</span></a>
        </div>
    </article>
</div>
@endsection
