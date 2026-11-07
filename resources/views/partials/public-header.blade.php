<header class="sticky top-0 z-50 border-b border-line bg-cream/90 backdrop-blur-md">
    <nav class="mx-auto flex max-w-shell items-center justify-between gap-4 px-5 py-3.5" aria-label="Navigasi utama">
        <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-2.5">
            <img src="{{ asset('assets/logo/logo-mark.webp') }}" alt="" class="h-9 w-9 rounded-xl object-contain">
            <span class="text-base font-extrabold tracking-tight text-forest">Bali Eling Luu</span>
        </a>

        <ul class="hidden items-center gap-6 text-sm font-semibold text-ink md:flex">
            <li><a href="{{ route('home') }}" class="transition hover:text-primary">Beranda</a></li>
            <li><a href="{{ route('panduan') }}" class="transition hover:text-primary">Panduan</a></li>
            <li><a href="{{ route('home') }}#peta" class="transition hover:text-primary">Eco Map</a></li>
            <li><a href="{{ route('dashboard') }}" class="transition hover:text-primary">Dashboard</a></li>
            <li><a href="{{ route('artikel.index') }}" class="font-bold text-primary">Artikel</a></li>
        </ul>

        <a href="{{ route('home') }}" class="text-sm font-bold text-primary md:hidden">Beranda</a>
    </nav>
</header>
