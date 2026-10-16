<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#18382d">
    <title>{{ $title ?? 'Mks Eats | Good food, good people' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['DM Sans', 'sans-serif'],
                        display: ['Manrope', 'sans-serif'],
                    },
                    colors: {
                        forest: '#18382d',
                        citrus: '#f37b43',
                        cream: '#fbf8f1',
                    },
                    boxShadow: {
                        card: '0 18px 45px rgba(24, 56, 45, 0.08)',
                    },
                },
            },
        };
    </script>
</head>
<body class="min-h-screen bg-cream font-sans text-slate-800 antialiased">
    <header class="sticky top-0 z-20 border-b border-forest/10 bg-cream/95 backdrop-blur">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-5 py-4 sm:px-8">
            <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-3" aria-label="Mks Eats home">
                <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-forest font-display text-sm font-extrabold tracking-tight text-white shadow-lg shadow-forest/15">ME<span class="text-citrus">.</span></span>
                <span class="font-display text-xl font-extrabold tracking-tight text-forest sm:text-2xl">Mks <span class="text-citrus">Eats</span></span>
            </a>
            <nav class="flex items-center gap-3 text-sm font-semibold sm:gap-7">
                <a href="{{ route('products.index') }}" class="text-forest/75 transition hover:text-citrus">Explore food</a>
                <a href="{{ route('admin.login') }}" class="rounded-full border border-forest/15 px-4 py-2.5 text-forest transition hover:border-forest hover:bg-forest hover:text-white">Partner login</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="mt-16 bg-forest text-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-5 px-5 py-9 sm:flex-row sm:items-center sm:justify-between sm:px-8">
            <a href="{{ route('home') }}" class="font-display text-xl font-extrabold">Mks <span class="text-citrus">Eats</span></a>
            <p class="text-sm text-white/65">Good food. Good people. Proudly local.</p>
            <a href="{{ route('products.index') }}" class="text-sm font-semibold text-white transition hover:text-citrus">Find your next favourite <span aria-hidden="true">↗</span></a>
        </div>
    </footer>
</body>
</html>
