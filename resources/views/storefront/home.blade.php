@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-7xl px-5 pb-10 pt-8 sm:px-8 sm:pt-12">
    <section class="relative isolate overflow-hidden rounded-[2rem] bg-forest text-white shadow-card">
        <div class="absolute -right-16 -top-24 -z-10 h-80 w-80 rounded-full bg-citrus/20 blur-3xl"></div>
        <div class="grid items-center lg:grid-cols-[1.05fr_0.95fr]">
            <div class="px-7 py-12 sm:px-12 sm:py-16 lg:py-20">
                <p class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-bold uppercase tracking-[0.18em] text-orange-100">
                    <span class="h-2 w-2 rounded-full bg-lime-300"></span> Made local, shared with love
                </p>
                <h1 class="mt-7 max-w-xl font-display text-4xl font-extrabold leading-[1.08] tracking-tight sm:text-6xl">Good food.<br>Good people.<br><span class="text-citrus">Mks Eats.</span></h1>
                <p class="mt-6 max-w-lg text-base leading-7 text-white/75 sm:text-lg">Find delicious local favourites and fresh finds from the people who make our communities special.</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('products.index') }}" class="rounded-full bg-citrus px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-black/15 transition hover:-translate-y-0.5 hover:bg-orange-500">Discover the menu <span aria-hidden="true">→</span></a>
                    <a href="{{ route('admin.login') }}" class="rounded-full border border-white/25 px-6 py-3.5 text-sm font-bold text-white transition hover:bg-white/10">Sell with us</a>
                </div>
                <div class="mt-10 flex items-center gap-4 text-sm text-white/70">
                    <div class="flex -space-x-2" aria-hidden="true">
                        <span class="flex h-9 w-9 items-center justify-center rounded-full border-2 border-forest bg-orange-200 text-sm">🍊</span>
                        <span class="flex h-9 w-9 items-center justify-center rounded-full border-2 border-forest bg-lime-200 text-sm">🥑</span>
                        <span class="flex h-9 w-9 items-center justify-center rounded-full border-2 border-forest bg-rose-200 text-sm">🍓</span>
                    </div>
                    <span>Big flavour, right from your neighbourhood.</span>
                </div>
            </div>
            <div class="relative min-h-[300px] p-4 sm:min-h-[440px] sm:p-7 lg:h-full">
                <img src="https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=1400&q=90" alt="A colourful, freshly prepared meal with greens and seasonal vegetables" class="absolute inset-4 h-[calc(100%-2rem)] w-[calc(100%-2rem)] rounded-[1.5rem] object-cover sm:inset-7 sm:h-[calc(100%-3.5rem)] sm:w-[calc(100%-3.5rem)] sm:rounded-[1.6rem]">
                <div class="absolute bottom-9 left-9 rounded-2xl border border-white/25 bg-white/90 px-4 py-3 text-forest shadow-xl backdrop-blur sm:bottom-12 sm:left-12">
                    <p class="text-xs font-semibold uppercase tracking-widest text-forest/55">Your local food spot</p>
                    <p class="mt-1 font-display text-lg font-extrabold">Fresh things are cooking <span aria-hidden="true">✦</span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-14 sm:mt-16">
        <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-citrus">Handpicked for you</p>
                <h2 class="mt-2 font-display text-3xl font-extrabold tracking-tight text-forest sm:text-4xl">Local picks, big flavour</h2>
            </div>
            <a href="{{ route('products.index') }}" class="rounded-full border border-forest/15 px-5 py-2.5 text-sm font-bold text-forest transition hover:border-forest hover:bg-forest hover:text-white">See everything <span aria-hidden="true">→</span></a>
        </div>

        @if($products->count())
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($products as $product)
                    @include('storefront.partials.product-card', ['product' => $product])
                @endforeach
            </div>
        @else
            <div class="rounded-3xl border border-dashed border-forest/20 bg-white p-10 text-center">
                <p class="text-4xl" aria-hidden="true">🍲</p>
                <h3 class="mt-4 font-display text-xl font-bold text-forest">The table is getting set</h3>
                <p class="mt-2 text-sm text-slate-500">Check back soon for local favourites from Mks Eats.</p>
            </div>
        @endif
    </section>

    <section class="mt-14 flex flex-col justify-between gap-5 rounded-3xl bg-orange-100 px-7 py-8 sm:flex-row sm:items-center sm:px-10">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-citrus">Good food does good</p>
            <h2 class="mt-2 font-display text-2xl font-extrabold text-forest">Every order backs a local dream.</h2>
        </div>
        <a href="{{ route('products.index') }}" class="w-fit rounded-full bg-forest px-6 py-3 text-sm font-bold text-white transition hover:bg-forest/90">Shop local <span aria-hidden="true">→</span></a>
    </section>
</div>
@endsection
