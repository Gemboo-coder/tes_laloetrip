@extends('layouts.layout')

@section('title', $paketTrip->nama_paket . ' — LaloeTrip')

@section('content')

{{-- HERO --}}
<section class="detail-hero">
    <div class="detail-hero-bg"
         style="background-image: url('{{$paketTrip->thumbnail? asset('storage/' . $paketTrip->thumbnail)
                : asset('assets/gili.jpg') }}');">
    </div>
    <div class="detail-hero-dimmer"></div>
    <div class="detail-hero-content">
        <span class="hero-badge">✦ {{ $paketTrip->jenis_paket }}</span>
        <h1 class="hero-title mt-3">{{ $paketTrip->nama_paket }}</h1>
        <div class="detail-hero-meta">
            <span>⏱ {{ $paketTrip->durasi }}</span>
            <span>💰 Mulai Rp {{ number_format($paketTrip->harga, 0, ',', '.') }}/pax</span>
        </div>
    </div>
    <div class="detail-hero-wave">
        <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="var(--cream)"/>
        </svg>
    </div>
</section>

{{-- MAIN CONTENT --}}
<section style="background: var(--cream); padding: 4rem 5% 6rem;">
    <div class="detail-layout">

        {{-- KIRI: KONTEN UTAMA --}}
        <div class="detail-main">

            {{-- DESKRIPSI --}}
            <div class="detail-card">
                <h2 class="detail-section-title">Tentang Paket Ini</h2>
                <p class="detail-desc">{{ $paketTrip->deskripsi }}</p>
            </div>

            {{-- DESTINASI --}}
            @if($paketTrip->destinasis->isNotEmpty())
            <div class="detail-card">
                <h2 class="detail-section-title">Destinasi dalam Paket</h2>
                <div class="destinasi-grid">
                    @foreach($paketTrip->destinasis as $destinasi)
                    <div class="destinasi-card">
                        <div class="destinasi-img-wrap">
                            @if($destinasi->gambar)
                                <img src="{{ asset('storage/' . $destinasi->gambar) }}"
                                     alt="{{ $destinasi->nama_destinasi }}"
                                     class="destinasi-img">
                            @else
                                <div class="destinasi-img-placeholder">🏝️</div>
                            @endif
                            <span class="destinasi-kategori">{{ $destinasi->kategori }}</span>
                        </div>
                        <div class="destinasi-body">
                            <h4 class="destinasi-nama">{{ $destinasi->nama_destinasi }}</h4>
                            <p class="destinasi-desc">{{ Str::limit($destinasi->deskripsi, 80) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- GALERI --}}
            @if($paketTrip->galeris->isNotEmpty())
            <div class="detail-card">
                <h2 class="detail-section-title">Galeri Foto</h2>
                <div class="galeri-grid">
                    @foreach($paketTrip->galeris as $galeri)
                    <div class="galeri-item">
                        @if($galeri->gambar)
                            <img src="{{ asset('storage/' . $galeri->gambar) }}"
                                 alt="{{ $galeri->judul }}"
                                 class="galeri-img">
                        @else
                            <div class="galeri-placeholder">📷</div>
                        @endif
                        <div class="galeri-overlay">
                            <span>{{ $galeri->judul }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>

        {{-- KANAN: SIDEBAR BOOKING --}}
        <aside class="detail-sidebar">
            <div class="sidebar-card">
                <div class="sidebar-price-wrap">
                    <span class="sidebar-price-label">Mulai dari</span>
                    <div class="sidebar-price">
                        Rp {{ number_format($paketTrip->harga, 0, ',', '.') }}
                        <span>/pax</span>
                    </div>
                </div>

                <div class="sidebar-info-list">
                    <div class="sidebar-info-item">
                        <span class="sidebar-info-icon">⏱</span>
                        <div>
                            <div class="sidebar-info-label">Durasi</div>
                            <div class="sidebar-info-val">{{ $paketTrip->durasi }}</div>
                        </div>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="sidebar-info-icon">🗂</span>
                        <div>
                            <div class="sidebar-info-label">Jenis Paket</div>
                            <div class="sidebar-info-val">{{ $paketTrip->jenis_paket }}</div>
                        </div>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="sidebar-info-icon">🏝️</span>
                        <div>
                            <div class="sidebar-info-label">Jumlah Destinasi</div>
                            <div class="sidebar-info-val">{{ $paketTrip->destinasis->count() }} Destinasi</div>
                        </div>
                    </div>
                </div>

                <a href="https://wa.me/6285713717336?text=Halo%20LaloeTrip%2C%20saya%20tertarik%20dengan%20paket%20{{ urlencode($paketTrip->nama_paket) }}"
                   target="_blank"
                   class="sidebar-wa-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="margin-right:8px;flex-shrink:0">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                        <path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.122 1.532 5.854L.057 23.886l6.183-1.453A11.945 11.945 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.9 0-3.681-.497-5.228-1.367l-.375-.222-3.67.862.878-3.584-.244-.389A9.951 9.951 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/>
                    </svg>
                    Book via WhatsApp
                </a>

                <div class="sidebar-dp-note">
                    💡 Sistem DP — bayar sebagian untuk konfirmasi booking
                </div>
            </div>

            {{-- BACK BUTTON --}}
            <a href="{{ route('paket.paket') }}" class="sidebar-back-btn">
                ← Lihat Paket Lainnya
            </a>
        </aside>

    </div>
</section>

@endsection

@push('css')
<style>
/* ── HERO ── */
.detail-hero {
    position: relative;
    height: 65vh;
    min-height: 450px;
    display: flex;
    align-items: flex-end;
    justify-content: flex-start;
    padding: 0 5% 5rem;
    overflow: hidden;
}
.detail-hero-bg {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
}
.detail-hero-dimmer {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(10,22,40,.9) 0%, rgba(10,22,40,.3) 60%, transparent 100%);
    z-index: 1;
}
.detail-hero-content {
    position: relative;
    z-index: 10;
    text-align: left;
}
.detail-hero-meta {
    display: flex;
    gap: 1.5rem;
    margin-top: .8rem;
    color: rgba(255,255,255,.85);
    font-size: .9rem;
    flex-wrap: wrap;
}
.detail-hero-wave {
    position: absolute;
    bottom: -1px;
    width: 100%;
    z-index: 15;
}

/* ── LAYOUT ── */
.detail-layout {
    display: grid;
    grid-template-columns: 1fr 340px;
    gap: 2rem;
    align-items: start;
}

/* ── DETAIL CARD ── */
.detail-card {
    background: #fff;
    border-radius: 20px;
    padding: 2rem 2.2rem;
    box-shadow: 0 4px 24px rgba(0,0,0,.06);
    margin-bottom: 1.8rem;
}
.detail-section-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 1.2rem;
    padding-bottom: .8rem;
    border-bottom: 2px solid var(--cream);
}
.detail-desc {
    font-size: .92rem;
    color: #4e6070;
    line-height: 1.8;
    margin: 0;
}

/* ── DESTINASI GRID ── */
.destinasi-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.2rem;
}
.destinasi-card {
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid rgba(0,0,0,.07);
    transition: transform .3s, box-shadow .3s;
}
.destinasi-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 30px rgba(0,0,0,.1);
}
.destinasi-img-wrap {
    position: relative;
    height: 140px;
    background: linear-gradient(135deg, var(--dark), #0D2137);
}
.destinasi-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.destinasi-img-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
}
.destinasi-kategori {
    position: absolute;
    bottom: .6rem;
    left: .6rem;
    background: rgba(10,22,40,.8);
    color: #fff;
    font-size: .68rem;
    font-weight: 600;
    padding: .2rem .7rem;
    border-radius: 50px;
}
.destinasi-body {
    padding: .9rem 1rem;
}
.destinasi-nama {
    font-family: 'Playfair Display', serif;
    font-size: 1rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: .3rem;
}
.destinasi-desc {
    font-size: .78rem;
    color: #6a7d90;
    line-height: 1.5;
    margin: 0;
}

/* ── GALERI GRID ── */
.galeri-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: .8rem;
}
.galeri-item {
    position: relative;
    height: 130px;
    border-radius: 12px;
    overflow: hidden;
    background: linear-gradient(135deg, var(--dark), #0D2137);
    cursor: pointer;
}
.galeri-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .4s;
}
.galeri-item:hover .galeri-img { transform: scale(1.08); }
.galeri-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
}
.galeri-overlay {
    position: absolute;
    inset: 0;
    background: rgba(10,22,40,.55);
    display: flex;
    align-items: flex-end;
    padding: .6rem;
    opacity: 0;
    transition: opacity .3s;
}
.galeri-item:hover .galeri-overlay { opacity: 1; }
.galeri-overlay span {
    color: #fff;
    font-size: .72rem;
    font-weight: 500;
}

/* ── SIDEBAR ── */
.detail-sidebar {
    position: sticky;
    top: 100px;
}
.sidebar-card {
    background: #fff;
    border-radius: 20px;
    padding: 1.8rem;
    box-shadow: 0 4px 24px rgba(0,0,0,.08);
    border-top: 4px solid var(--gold);
}
.sidebar-price-wrap {
    margin-bottom: 1.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid rgba(0,0,0,.07);
}
.sidebar-price-label {
    font-size: .75rem;
    color: #9aacbc;
    display: block;
    margin-bottom: .2rem;
}
.sidebar-price {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--dark);
}
.sidebar-price span {
    font-size: .8rem;
    color: #9aacbc;
    font-family: 'Outfit', sans-serif;
    font-weight: 400;
}
.sidebar-info-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin-bottom: 1.5rem;
}
.sidebar-info-item {
    display: flex;
    align-items: center;
    gap: .8rem;
}
.sidebar-info-icon {
    font-size: 1.2rem;
    width: 36px;
    height: 36px;
    background: var(--cream);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.sidebar-info-label {
    font-size: .72rem;
    color: #9aacbc;
    margin-bottom: .1rem;
}
.sidebar-info-val {
    font-size: .88rem;
    font-weight: 600;
    color: var(--dark);
}
.sidebar-wa-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #25D366;
    color: #fff;
    padding: .85rem 1.5rem;
    border-radius: 14px;
    font-weight: 700;
    font-size: .9rem;
    text-decoration: none;
    transition: all .3s;
    box-shadow: 0 6px 20px rgba(37,211,102,.3);
    margin-bottom: 1rem;
}
.sidebar-wa-btn:hover {
    background: #1aaa53;
    transform: translateY(-2px);
    color: #fff;
}
.sidebar-dp-note {
    font-size: .75rem;
    color: #9aacbc;
    text-align: center;
    line-height: 1.5;
}
.sidebar-back-btn {
    display: block;
    text-align: center;
    margin-top: 1rem;
    color: #6a7d90;
    font-size: .85rem;
    text-decoration: none;
    padding: .7rem;
    border-radius: 12px;
    border: 1.5px solid rgba(0,0,0,.1);
    transition: all .25s;
}
.sidebar-back-btn:hover {
    background: var(--dark);
    color: #fff;
    border-color: var(--dark);
}

/* ── RESPONSIVE ── */
@media (max-width: 992px) {
    .detail-layout { grid-template-columns: 1fr; }
    .detail-sidebar { position: static; }
    .destinasi-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 640px) {
    .detail-hero { height: 50vh; padding: 0 5% 4rem; }
    .destinasi-grid { grid-template-columns: 1fr; }
    .galeri-grid { grid-template-columns: repeat(2, 1fr); }
}
</style>
@endpush