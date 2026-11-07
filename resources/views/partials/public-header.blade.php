<header class="sticky top-0 z-50 border-b border-line bg-cream/90 backdrop-blur-md">
    <nav class="mx-auto flex max-w-shell items-center justify-between gap-4 px-5 py-3.5" aria-label="Navigasi utama">
        <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-2.5">
            <img src="{{ asset('assets/logo/logo-mark.webp') }}" alt="" class="h-9 w-9 rounded-xl object-contain">
            <span class="text-base font-extrabold tracking-tight text-forest">Bali Eling Luu</span>
        </a>

        <ul class="hidden items-center gap-6 text-sm font-semibold text-ink md:flex">
            <li>
                <a href="{{ route('home') }}"
                   @if(($navAktif ?? null) === 'beranda') aria-current="page" class="font-bold text-primary"
                   @else class="transition hover:text-primary" @endif>Beranda</a>
            </li>
            <li>
                <a href="{{ route('panduan') }}"
                   @if(in_array($navAktif ?? null, ['panduan', 'edukasi'], true)) aria-current="page" class="font-bold text-primary"
                   @else class="transition hover:text-primary" @endif>Panduan</a>
            </li>
            <li><a href="{{ route('home') }}#peta" class="transition hover:text-primary">Eco Map</a></li>
            <li>
                <a href="{{ route('dashboard') }}"
                   @if(($navAktif ?? null) === 'dashboard') aria-current="page" class="font-bold text-primary"
                   @else class="transition hover:text-primary" @endif>Dashboard</a>
            </li>
            <li>
                <a href="{{ route('artikel.index') }}"
                   @if(($navAktif ?? null) === 'artikel') aria-current="page" class="font-bold text-primary"
                   @else class="transition hover:text-primary" @endif>Artikel</a>
            </li>
        </ul>

        <a href="{{ route('home') }}" class="text-sm font-bold text-primary md:hidden">Beranda</a>
    </nav>
</header>
