@extends('layouts.layout')

@section('title', 'Galeri — LaloeTrip')

@section('content')

{{-- HERO --}}
<section class="galeri-hero">
    <div class="galeri-hero-bg"></div>
    <div class="galeri-hero-dimmer"></div>
    <div class="galeri-hero-content">
        <span class="hero-badge" style="border-color:var(--gold); color:var(--gold);">✦ Dokumentasi</span>
        <h1 class="galeri-hero-title">Galeri Foto</h1>
        <p class="galeri-hero-sub">Kumpulan momen dari berbagai destinasi wisata Nusa Tenggara Barat</p>
    </div>
    <div class="galeri-hero-wave">
        <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="var(--cream)"/>
        </svg>
    </div>
</section>

{{-- MAIN --}}
<section style="background:var(--cream); padding:1rem 5% 6rem;">

    {{-- FILTER DESTINASI --}}
    <div class="galeri-filter">
        <a href="{{ route('galeri.index') }}" class="galeri-filter-pill {{ !$destinasiId ? 'active' : '' }}">
            Semua Destinasi
        </a>
        @foreach($destinasiList as $item)
        <a href="{{ route('galeri.index', ['destinasi' => $item->id]) }}"
           class="galeri-filter-pill {{ (string) $destinasiId === (string) $item->id ? 'active' : '' }}">
            {{ $item->nama_destinasi }}
        </a>
        @endforeach
    </div>

    {{-- GRID GALERI --}}
    @if($galeris->isNotEmpty())
    <div class="galeri-grid">
        @foreach($galeris as $foto)
        <div class="galeri-card" data-bs-toggle="modal" data-bs-target="#galeriModal{{ $foto->id }}">
            <img src="{{ asset('storage/' . $foto->gambar) }}" alt="{{ $foto->destinasi->nama_destinasi ?? '' }}" class="galeri-card-img">
            <div class="galeri-card-overlay">
                <span class="galeri-card-label">{{ $foto->destinasi->nama_destinasi ?? '' }}</span>
            </div>
        </div>

        <div class="modal fade" id="galeriModal{{ $foto->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="background:transparent; border:none;">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" style="position:absolute; top:-2.2rem; right:0;"></button>
                    <img src="{{ asset('storage/' . $foto->gambar) }}" class="img-fluid rounded" alt="{{ $foto->destinasi->nama_destinasi ?? '' }}">
                    @if($foto->destinasi)
                    <p style="color:#fff; text-align:center; margin-top:.8rem; font-family:'Playfair Display', serif; font-size:1.1rem;">
                        {{ $foto->destinasi->nama_destinasi }}
                    </p>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="galeri-empty">
        <p>Belum ada foto galeri untuk ditampilkan.</p>
    </div>
    @endif

</section>

@endsection

@push('css')
<style>
/* ── HERO ── */
.galeri-hero {
    position: relative;
    height: 32vh;
    min-height: 240px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}
.galeri-hero-bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--dark), #0D2137);
}
.galeri-hero-dimmer {
    position: absolute;
    inset: 0;
    background: rgba(10,22,40,.15);
    z-index: 1;
}
.galeri-hero-content {
    position: relative;
    z-index: 5;
    max-width: 600px;
    padding: 0 1rem;
}
.galeri-hero-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.4rem;
    font-weight: 700;
    color: #fff;
    margin: .6rem 0 .5rem;
}
.galeri-hero-sub {
    color: rgba(255,255,255,.75);
    font-size: .95rem;
    margin: 0;
}
.galeri-hero-wave {
    position: absolute;
    bottom: -1px;
    width: 100%;
    z-index: 15;
}

/* ── FILTER ── */
.galeri-filter {
    display: flex;
    flex-wrap: wrap;
    gap: .6rem;
    margin: 2rem 0 1.8rem;
}
.galeri-filter-pill {
    display: inline-block;
    padding: .5rem 1.2rem;
    border-radius: 50px;
    font-size: .82rem;
    font-weight: 600;
    color: var(--dark);
    background: #fff;
    border: 1.5px solid rgba(0,0,0,.08);
    text-decoration: none;
    transition: all .25s;
}
.galeri-filter-pill:hover {
    border-color: var(--gold);
    color: var(--dark);
}
.galeri-filter-pill.active {
    background: var(--dark);
    color: #fff;
    border-color: var(--dark);
}

/* ── GRID ── */
.galeri-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 1.2rem;
}
.galeri-card {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    cursor: pointer;
    aspect-ratio: 4/3;
    box-shadow: 0 4px 20px rgba(0,0,0,.06);
}
.galeri-card-img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .4s;
}
.galeri-card:hover .galeri-card-img {
    transform: scale(1.08);
}
.galeri-card-overlay {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    padding: 1.4rem .9rem .8rem;
    background: linear-gradient(to top, rgba(10,22,40,.85), transparent);
}
.galeri-card-label {
    color: #fff;
    font-family: 'Playfair Display', serif;
    font-size: .95rem;
    font-weight: 700;
}

/* ── EMPTY STATE ── */
.galeri-empty {
    text-align: center;
    padding: 4rem 1rem;
    color: #9aacbc;
    font-size: .95rem;
}

/* ── RESPONSIVE ── */
@media (max-width: 640px) {
    .galeri-hero { height: 26vh; min-height: 200px; }
    .galeri-hero-title { font-size: 1.7rem; }
    .galeri-grid { grid-template-columns: repeat(2, 1fr); gap: .8rem; }
}
</style>
@endpush