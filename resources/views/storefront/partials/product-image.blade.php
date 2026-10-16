@php
    $image = $product->images->first();
    $fallbackImages = [
        'woven-storage-basket' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=1000&q=85',
        'organic-breakfast-pack' => 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?auto=format&fit=crop&w=1000&q=85',
        'handmade-leather-tote' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=1000&q=85',
    ];
    $imageUrl = $image
        ? (\Illuminate\Support\Str::startsWith($image->path, ['http://', 'https://'])
            ? $image->path
            : \Illuminate\Support\Facades\Storage::url($image->path))
        : ($fallbackImages[$product->slug] ?? null);
@endphp

@if ($imageUrl)
    <img src="{{ $imageUrl }}" alt="{{ $image?->alt_text ?: $product->name }}" class="{{ $imageClass ?? 'h-full w-full object-cover' }}" loading="lazy">
@else
    <div class="{{ $imageClass ?? 'h-full w-full' }} flex items-center justify-center bg-gradient-to-br from-orange-100 via-amber-50 to-lime-100" role="img" aria-label="{{ $product->name }}">
        <span class="text-5xl" aria-hidden="true">🥬</span>
    </div>
@endif
