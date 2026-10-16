@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-7xl px-5 py-10 sm:px-8 sm:py-14">
    <section class="flex flex-col justify-between gap-6 rounded-3xl bg-forest px-7 py-8 text-white sm:flex-row sm:items-end sm:px-10 sm:py-10">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-orange-200">Find your new favourite</p>
            <h1 class="mt-2 font-display text-4xl font-extrabold tracking-tight sm:text-5xl">The good stuff.</h1>
            <p class="mt-3 max-w-lg text-sm leading-6 text-white/70">A little something delicious from the makers and growers around you.</p>
        </div>
        <form method="GET" action="{{ route('products.index') }}" class="flex w-full max-w-md gap-2 rounded-full bg-white p-1.5 shadow-lg">
            <label for="product-search" class="sr-only">Search products</label>
            <input id="product-search" type="search" name="q" value="{{ request('q') }}" placeholder="Find something tasty..." class="min-w-0 flex-1 rounded-full border-0 bg-transparent px-4 py-2.5 text-sm text-forest outline-none placeholder:text-slate-400 focus:ring-0">
            <button type="submit" class="shrink-0 rounded-full bg-citrus px-5 py-2.5 text-sm font-bold text-white transition hover:bg-orange-500">Search</button>
        </form>
    </section>

    <div class="mb-5 mt-9 flex items-center justify-between">
        <h2 class="font-display text-xl font-extrabold text-forest">Shop local</h2>
        <span class="rounded-full bg-white px-4 py-2 text-sm font-semibold text-forest/60 shadow-sm">{{ $products->total() }} {{ $products->total() === 1 ? 'find' : 'finds' }}</span>
    </div>

    @if($products->count())
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($products as $product)
                @include('storefront.partials.product-card', ['product' => $product])
            @endforeach
        </div>
        <div class="mt-9">{{ $products->links() }}</div>
    @else
        <div class="rounded-3xl border border-dashed border-forest/20 bg-white p-12 text-center">
            <p class="text-5xl" aria-hidden="true">🍽️</p>
            <h2 class="mt-4 font-display text-2xl font-extrabold text-forest">Nothing on the menu just yet</h2>
            <p class="mt-2 text-sm text-slate-500">Try another search or come back for the next local drop.</p>
            @if(request('q'))
                <a href="{{ route('products.index') }}" class="mt-5 inline-flex rounded-full bg-forest px-5 py-2.5 text-sm font-bold text-white">Browse everything</a>
            @endif
        </div>
    @endif
</div>
@endsection
