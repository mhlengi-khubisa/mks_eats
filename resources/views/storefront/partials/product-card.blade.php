<a href="{{ url('/products/' . $product->slug) }}" class="group overflow-hidden rounded-3xl border border-forest/10 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-card">
    <div class="relative h-56 overflow-hidden bg-orange-50">
        @include('storefront.partials.product-image', ['product' => $product, 'imageClass' => 'h-full w-full object-cover transition duration-500 group-hover:scale-105'])
        <span class="absolute left-4 top-4 rounded-full bg-white/95 px-3 py-1.5 text-[11px] font-bold uppercase tracking-wider text-forest shadow-sm">{{ $product->category->name ?? 'Local pick' }}</span>
    </div>
    <div class="p-5">
        <p class="text-xs font-semibold uppercase tracking-wider text-forest/45">{{ $product->vendor->store_name ?? 'Local maker' }}</p>
        <h3 class="mt-2 font-display text-lg font-extrabold leading-snug text-forest">{{ $product->name }}</h3>
        <div class="mt-4 flex items-center justify-between border-t border-slate-100 pt-4">
            <span class="font-display text-xl font-extrabold text-forest">R{{ number_format($product->price, 2) }}</span>
            <span class="flex h-9 w-9 items-center justify-center rounded-full bg-orange-100 text-citrus transition group-hover:bg-citrus group-hover:text-white" aria-label="View product">↗</span>
        </div>
    </div>
</a>
