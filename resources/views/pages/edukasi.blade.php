@extends('layouts.app')

@php
    $semuaKategori = [
        'organik' => [
            'nama' => 'Organik',
            'deskripsi' => 'Sampah yang mudah terurai secara alami, seperti sisa makanan, daun, dan kulit buah.',
        ],
        'anorganik' => [
            'nama' => 'Anorganik',
            'deskripsi' => 'Material yang berpotensi didaur ulang, seperti botol plastik, kaleng, kardus, dan kaca.',
        ],
        'residu' => [
            'nama' => 'Residu',
            'deskripsi' => 'Sampah yang sulit diproses lewat jalur daur ulang yang tersedia, seperti tisu bekas dan popok.',
        ],
        'b3' => [
            'nama' => 'B3 / Khusus',
            'deskripsi' => 'Limbah berbahaya dan beracun yang perlu penanganan khusus, seperti baterai dan lampu tertentu.',
        ],
    ];

    $kategori = $semuaKategori[$jenis ?? ''] ?? null;
@endphp

@section('title', $kategori ? 'Edukasi ' . $kategori['nama'] . ' — Bali Eling Luu' : 'Edukasi Sampah — Bali Eling Luu')

@section('description', 'Materi edukasi pemilahan sampah Bali Eling Luu. Halaman ini sedang dalam proses migrasi dari versi statis.')

@section('content')
@include('partials.public-header')

<main class="mx-auto max-w-shell px-5 py-16 sm:py-24">
    <span class="inline-flex items-center rounded-full border border-terra/30 bg-terra/10 px-3.5 py-1 text-xs font-extrabold text-terra-deep">
        Dalam Pengembangan
    </span>

    <h1 class="mt-4 max-w-3xl text-3xl font-extrabold leading-tight tracking-tight text-forest sm:text-4xl lg:text-5xl">
        {{ $kategori ? 'Edukasi Sampah ' . $kategori['nama'] : 'Edukasi Sampah' }}
    </h1>

    <p class="mt-5 max-w-2xl leading-relaxed text-muted">
        {{ $kategori ? $kategori['deskripsi'] : 'Materi edukasi lengkap sedang dipindahkan dari versi statis ke Laravel.' }}
    </p>

    <p class="mt-4 max-w-2xl text-sm leading-relaxed text-muted">
        Sementara itu, panduan pemilahan lengkap dan pencarian jenis sampah dapat diakses dari beranda.
    </p>

    <div class="mt-8 flex flex-wrap gap-3">
        <a href="{{ route('home') }}#panduan" class="rounded-xl bg-forest px-5 py-3 text-sm font-bold text-white transition hover:bg-deep">
            Cari Jenis Sampah
        </a>
        <a href="{{ route('panduan') }}" class="rounded-xl border border-line bg-white px-5 py-3 text-sm font-bold text-forest transition hover:border-primary hover:text-primary">
            Buka Panduan Sampah
        </a>
    </div>

    <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($semuaKategori as $key => $item)
            <a href="{{ route('edukasi', ['jenis' => $key]) }}"
               class="rounded-2xl border border-line bg-white p-5 transition hover:-translate-y-1 hover:border-primary hover:shadow-lg hover:shadow-forest/10">
                <p class="text-xs font-bold uppercase tracking-wide text-muted">Kategori</p>
                <h2 class="mt-2 text-lg font-extrabold text-forest">{{ $item['nama'] }}</h2>
                <p class="mt-2 text-sm leading-relaxed text-muted">{{ $item['deskripsi'] }}</p>
            </a>
        @endforeach
    </div>
</main>

@include('partials.public-footer')
@endsection
