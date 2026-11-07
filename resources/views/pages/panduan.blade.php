@extends('layouts.app')

@section('title', 'Panduan Sampah — Bali Eling Luu')

@section('description', 'Panduan memilah sampah Bali Eling Luu. Halaman ini sedang dalam proses migrasi dari versi statis.')

@section('content')
@include('partials.public-header')

<main class="mx-auto max-w-shell px-5 py-16 sm:py-24">
    <span class="inline-flex items-center rounded-full border border-terra/30 bg-terra/10 px-3.5 py-1 text-xs font-extrabold text-terra-deep">
        Dalam Pengembangan
    </span>

    <h1 class="mt-4 max-w-3xl text-3xl font-extrabold leading-tight tracking-tight text-forest sm:text-4xl lg:text-5xl">
        Panduan Sampah
    </h1>

    <p class="mt-5 max-w-2xl leading-relaxed text-muted">
        Panduan lengkap empat kategori sampah sedang dipindahkan dari versi statis ke Laravel.
        Sementara itu, gunakan pencarian jenis sampah dan panduan kategori di beranda.
    </p>

    <div class="mt-8 flex flex-wrap gap-3">
        <a href="{{ route('home') }}#panduan" class="rounded-xl bg-forest px-5 py-3 text-sm font-bold text-white transition hover:bg-deep">
            Cari Jenis Sampah
        </a>
        <a href="{{ route('artikel.index') }}" class="rounded-xl border border-line bg-white px-5 py-3 text-sm font-bold text-forest transition hover:border-primary hover:text-primary">
            Baca Artikel
        </a>
    </div>

    <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach (['organik' => 'Organik', 'anorganik' => 'Anorganik', 'residu' => 'Residu', 'b3' => 'B3 / Khusus'] as $key => $nama)
            <a href="{{ route('edukasi', ['jenis' => $key]) }}"
               class="rounded-2xl border border-line bg-white p-5 transition hover:-translate-y-1 hover:border-primary hover:shadow-lg hover:shadow-forest/10">
                <h2 class="text-lg font-extrabold text-forest">{{ $nama }}</h2>
                <p class="mt-2 text-sm text-muted">Materi dan contoh untuk kategori {{ $nama }}.</p>
            </a>
        @endforeach
    </div>

    <div class="mt-12 rounded-2xl border border-line bg-cream p-5 text-sm leading-relaxed text-muted sm:p-6">
        <strong class="text-ink">Catatan:</strong> tidak semua barang dalam satu kategori bisa langsung didaur ulang.
        Selalu ikuti ketentuan dan fasilitas pengelolaan sampah setempat.
    </div>
</main>

@include('partials.public-footer')
@endsection
