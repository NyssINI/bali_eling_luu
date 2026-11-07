
@extends('layouts.app')

@section('title', 'Artikel — Bali Eling Luu')

@section('body_class', 'bg-cream font-sans text-ink')

@section('content')

@include('partials.public-header')

<main class="mx-auto max-w-shell px-5 pb-28 pt-8 sm:pb-24 lg:pb-16 lg:pt-12" id="isi">
    <div class="grid h-64 place-items-center text-sm text-muted">
        Memuat…
    </div>
</main>

@include('partials.public-footer')

<nav class="fixed bottom-0 left-0 z-40 w-full border-t border-line bg-white/95 backdrop-blur lg:hidden"
     aria-label="Navigasi bawah">

    <ul class="mx-auto grid max-w-shell grid-cols-5">

        <li>
            <a href="{{ route('home') }}"
               class="flex flex-col items-center gap-1 py-2.5 text-[10px] font-semibold text-muted transition hover:text-primary">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M3 10.5 12 3l9 7.5"/><path d="M5 9.5V21h14V9.5"/></svg>
                Beranda
            </a>
        </li>

        <li>
            <button type="button"
                    onclick="if(typeof openBaliElingScannerSafe==='function')openBaliElingScannerSafe()"
                    class="flex w-full flex-col items-center gap-1 py-2.5 text-[10px] font-semibold text-terra-deep">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M4 8V6a2 2 0 0 1 2-2h2M4 16v2a2 2 0 0 0 2 2h2M16 4h2a2 2 0 0 1 2 2v2M16 20h2a2 2 0 0 0 2-2v-2"/><circle cx="12" cy="12" r="3"/></svg>
                Scan AI
            </button>
        </li>

        <li>
            <a href="{{ route('panduan') }}"
               class="flex flex-col items-center gap-1 py-2.5 text-[10px] font-semibold text-muted transition hover:text-primary">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M4 5h16v14H4z"/><path d="M8 9h8M8 13h5"/></svg>
                Panduan
            </a>
        </li>

        <li>
            <a href="{{ route('home') }}#peta"
               class="flex flex-col items-center gap-1 py-2.5 text-[10px] font-semibold text-muted transition hover:text-primary">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11Z"/><circle cx="12" cy="10" r="2.5"/></svg>
                Eco Map
            </a>
        </li>

        <li>
            <a href="{{ route('artikel.index') }}"
               class="flex flex-col items-center gap-1 py-2.5 text-[10px] font-bold text-primary">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"/></svg>
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
@php
    $jsv = static fn (string $file): int => filemtime(public_path($file));
@endphp
<script>
    window.ARTIKEL_URL = @json(route('artikel.index'));
    window.ASSET_URL = @json(url('/'));
    window.HOME_URL = @json(route('home'));
    window.ARTIKEL_ID = @json($artikelId ?? null);
    window.BALI_MODEL_BASE = @json(asset('model') . '/');

    window.openBaliElingScannerSafe = function () {
        if (typeof window.openBaliElingScanner === 'function') return window.openBaliElingScanner();
        alert('Fitur AI Scanner belum tersedia.');
    };
</script>
<script src="{{ asset('js/data_sampah.js') }}?v={{ $jsv('js/data_sampah.js') }}"></script>
<script src="{{ asset('model/model_config.js') }}?v={{ $jsv('model/model_config.js') }}"></script>
<script src="{{ asset('js/ai_scanner.js') }}?v={{ $jsv('js/ai_scanner.js') }}"></script>
<script src="{{ asset('js/chat.js') }}?v={{ $jsv('js/chat.js') }}"></script>
@vite('resources/js/artikel.js')
@endpush
