
@extends('layouts.app')

@section('title', 'Artikel — Bali Eling Luu')

@section('content')

<main class="mx-auto max-w-shell px-5 pb-28 pt-8 sm:pb-24 lg:pb-16 lg:pt-12" id="isi">
    <div class="grid h-64 place-items-center text-sm text-muted">
        Memuat…
    </div>
</main>

<footer class="hidden border-t border-line bg-white lg:block">
    <div class="mx-auto flex max-w-shell items-center justify-between gap-6 px-5 py-8 text-sm text-muted">
        <p>© 2026 Bali Eling Luu — Jaga Alam, Lestarikan Bali.</p>

        <ul class="flex items-center gap-6">
            <li><a href="{{ url('/#beranda') }}" class="transition hover:text-primary">Beranda</a></li>
            <li><a href="{{ url('/#panduan') }}" class="transition hover:text-primary">Panduan Sampah</a></li>
            <li><a href="{{ url('/#tips') }}" class="transition hover:text-primary">Tips</a></li>
            <li><a href="{{ route('artikel.index') }}" class="font-bold text-primary">Artikel</a></li>
        </ul>
    </div>
</footer>

<nav class="fixed bottom-0 left-0 z-40 w-full border-t border-line bg-white/95 backdrop-blur lg:hidden"
     aria-label="Navigasi bawah">

    <ul class="mx-auto grid max-w-shell grid-cols-5">

        <li>
            <a href="{{ url('/#beranda') }}"
               class="flex flex-col items-center gap-1 py-2.5 text-[10px] font-semibold text-muted transition hover:text-primary">
                <i class="fa-solid fa-house text-lg"></i>
                Beranda
            </a>
        </li>

        <li>
            <button type="button"
                    onclick="if(typeof openBaliElingScannerSafe==='function')openBaliElingScannerSafe()"
                    class="flex w-full flex-col items-center gap-1 py-2.5 text-[10px] font-semibold text-terra">
                <i class="fa-solid fa-camera text-lg"></i>
                Scan AI
            </button>
        </li>

        <li>
            <a href="{{ url('/#panduan') }}"
               class="flex flex-col items-center gap-1 py-2.5 text-[10px] font-semibold text-muted transition hover:text-primary">
                <i class="fa-solid fa-recycle text-lg"></i>
                Panduan
            </a>
        </li>

        <li>
            <a href="{{ url('/#peta') }}"
               class="flex flex-col items-center gap-1 py-2.5 text-[10px] font-semibold text-muted transition hover:text-primary">
                <i class="fa-solid fa-map-location-dot text-lg"></i>
                Eco Map
            </a>
        </li>

        <li>
            <a href="{{ route('artikel.index') }}"
               class="flex flex-col items-center gap-1 py-2.5 text-[10px] font-bold text-primary">
                <i class="fa-solid fa-book-open text-lg"></i>
                Artikel
            </a>
        </li>

    </ul>
</nav>

@endsection

@push('styles')
<style>
    .isi-artikel > p {
        margin-top: 1.1rem;
    }

    .isi-artikel > p:first-child {
        margin-top: 0;
    }
</style>
@endpush

@push('scripts')
@vite('resources/js/artikel.js')
@endpush
