@extends('layouts.app')

@section('title', 'Dashboard Admin — Bali Eling Luu')
@section('description', 'Statistik dan ringkasan pengguna Bali Eling Luu untuk admin.')

@section('content')
@include('partials.public-header', ['navAktif' => 'dashboard'])

<main class="mx-auto max-w-shell px-5 pb-24 py-10 sm:py-14">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-terra-deep">Area Admin</p>
            <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-forest sm:text-4xl">Dashboard Admin</h1>
            <p class="mt-2 text-sm text-muted">Ringkasan pengguna dan XP untuk pemantauan awal.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="rounded-full bg-forest px-3 py-1.5 text-xs font-bold text-white">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="rounded-xl border border-line bg-white px-4 py-2 text-sm font-bold text-forest transition hover:border-primary hover:text-primary">Keluar</button>
            </form>
        </div>
    </div>

    @if(session('status'))
        <div class="mt-6 rounded-xl border border-primary/20 bg-primary/10 px-4 py-3 text-sm font-semibold text-forest" role="status">
            {{ session('status') }}
        </div>
    @endif

    <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-2xl border border-line bg-white p-5">
            <p class="text-xs font-bold uppercase tracking-wide text-muted">Total Pengguna</p>
            <p class="mt-2 text-3xl font-extrabold text-forest">{{ $totalUsers }}</p>
        </div>
        <div class="rounded-2xl border border-line bg-white p-5">
            <p class="text-xs font-bold uppercase tracking-wide text-muted">Admin</p>
            <p class="mt-2 text-3xl font-extrabold text-forest">{{ $adminUsers }}</p>
        </div>
        <div class="rounded-2xl border border-line bg-white p-5">
            <p class="text-xs font-bold uppercase tracking-wide text-muted">Pengguna Biasa</p>
            <p class="mt-2 text-3xl font-extrabold text-forest">{{ $regularUsers }}</p>
        </div>
        <div class="rounded-2xl border border-line bg-white p-5">
            <p class="text-xs font-bold uppercase tracking-wide text-muted">Total XP (Browser)</p>
            <p class="mt-2 text-3xl font-extrabold text-forest">{{ number_format($totalXp) }}</p>
        </div>
    </div>

    <div class="mt-8 rounded-2xl border border-line bg-white p-5 sm:p-6">
        <h2 class="text-base font-extrabold text-forest">Pengguna Terbaru</h2>
        @forelse($recentUsers as $u)
            <div class="flex items-center justify-between border-b border-line py-3 last:border-0">
                <div>
                    <p class="text-sm font-bold text-forest">{{ $u->name }}</p>
                    <p class="text-xs text-muted">{{ $u->email }} · {{ $u->role }}</p>
                </div>
                <span class="text-xs font-bold text-muted">{{ $u->xp_balance }} XP</span>
            </div>
        @empty
            <p class="mt-3 text-sm text-muted">Belum ada pengguna.</p>
        @endforelse
    </div>

    <p class="mt-6 text-xs leading-relaxed text-muted">
        Halaman admin foundation — manajemen tantangan, verifikasi bukti, reward, dan audit log akan ditambah di fase berikutnya.
    </p>
</main>

@include('partials.public-footer')
@include('partials.bottom-nav', ['navAktif' => 'dashboard'])
@endsection
