@extends('layouts.app')

@section('title', 'Dashboard — Bali Eling Luu')

@section('description', 'Dashboard aksi dan poin Bali Eling Luu. Halaman ini sedang dalam proses migrasi dari versi statis.')

@section('content')
@include('partials.public-header')

<main class="mx-auto max-w-shell px-5 py-16 sm:py-24">
    <span class="inline-flex items-center rounded-full border border-terra/30 bg-terra/10 px-3.5 py-1 text-xs font-extrabold text-terra-deep">
        Dalam Pengembangan
    </span>

    <h1 class="mt-4 max-w-3xl text-3xl font-extrabold leading-tight tracking-tight text-forest sm:text-4xl lg:text-5xl">
        Dashboard Aksi &amp; Poin Palemahan
    </h1>

    <p class="mt-5 max-w-2xl leading-relaxed text-muted">
        Halaman dashboard sedang dipindahkan dari versi statis ke Laravel. Untuk sementara,
        aksi harian, XP, dan Lapor Luu tetap bisa diakses dari beranda.
    </p>

    <div class="mt-8 flex flex-wrap gap-3">
        <a href="{{ route('home') }}#lapor" class="rounded-xl bg-forest px-5 py-3 text-sm font-bold text-white transition hover:bg-deep">
            Buka Lapor Luu
        </a>
        <a href="{{ route('home') }}" class="rounded-xl border border-line bg-white px-5 py-3 text-sm font-bold text-forest transition hover:border-primary hover:text-primary">
            Kembali ke Beranda
        </a>
    </div>

    <div class="mt-12 grid gap-4 sm:grid-cols-3">
        <div class="rounded-2xl border border-line bg-white p-5">
            <p class="text-xs font-bold uppercase tracking-wide text-muted">Status</p>
            <p class="mt-2 text-lg font-extrabold text-forest">Migrasi bertahap</p>
            <p class="mt-1 text-sm text-muted">Data dashboard belum dipindahkan ke database Laravel.</p>
        </div>
        <div class="rounded-2xl border border-line bg-white p-5">
            <p class="text-xs font-bold uppercase tracking-wide text-muted">Aksi warga</p>
            <p class="mt-2 text-lg font-extrabold text-forest">Lapor Luu</p>
            <p class="mt-1 text-sm text-muted">Masih tersedia di beranda dan tersimpan di perangkat.</p>
        </div>
        <div class="rounded-2xl border border-line bg-white p-5">
            <p class="text-xs font-bold uppercase tracking-wide text-muted">Poin</p>
            <p class="mt-2 text-lg font-extrabold text-forest">XP Palemahan</p>
            <p class="mt-1 text-sm text-muted">Belum ada sinkronisasi akun lintas perangkat.</p>
        </div>
    </div>
</main>

@include('partials.public-footer')
@endsection
