@extends('layouts.layout')

@section('title', 'LaloeTrip — Explore Lombok Like Never Before')

@section('content')

{{-- ═══════════════════════════════════════
     HERO CAROUSEL
════════════════════════════════════════ --}}
<section class="hero" id="home">
    <div id="heroCarousel" class="carousel slide carousel-fade hero-carousel" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner h-100">

            <div class="carousel-item active h-100" style="background-image: url('{{ asset('assets/gili.jpg') }}');">
                <div class="hero-dimmer"></div>
                <div class="hero-center-wrapper">
                    <div class="hero-content">
                        <div class="hero-badge">✦ Explore Lombok</div>
                        <h1 class="hero-title">Rasakan Keajaiban<br><em>Lombok Bersama Kami</em></h1>
                        <p class="hero-sub">Affordable healing trip dengan pengalaman lokal yang autentik, konten estetik, dan kenangan yang tak terlupakan.</p>
                        <div class="hero-btns mt-4">
                            <a href="#packages" class="btn-primary" style="text-decoration:none;">Lihat Paket Trip</a>
                            <a href="#about" class="btn-outline ms-2" style="text-decoration:none;">Tentang LaloeTrip</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item h-100" style="background-image: url('{{ asset('assets/rinjani.jpg') }}');">
                <div class="hero-dimmer"></div>
                <div class="hero-center-wrapper">
                    <div class="hero-content">
                        <div class="hero-badge">✦ Petualangan Seru</div>
                        <h1 class="hero-title">Jelajahi Puncak<br><em>Gunung Rinjani</em></h1>
                        <p class="hero-sub">Nikmati pemandangan spektakuler dan pengalaman mendaki yang tak terlupakan bersama guide profesional.</p>
                        <div class="hero-btns mt-4">
                            <a href="#packages" class="btn-primary" style="text-decoration:none;">Cek Jadwal</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" style="z-index:20;">
            <span class="carousel-control-prev-icon custom-nav-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next" style="z-index:20;">
            <span class="carousel-control-next-icon custom-nav-icon" aria-hidden="true"></span>
        </button>
    </div>

    <div class="hero-wave">
        <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="var(--cream)"/>
        </svg>
    </div>
</section>

{{-- ═══════════════════════════════════════
     STATS BAR
════════════════════════════════════════ --}}
<div class="stats-bar">
    <div class="stats-grid">
        <div><div class="stat-num">50+</div><div class="stat-label">DESTINASI</div></div>
        <div><div class="stat-num">500+</div><div class="stat-label">TRAVELER PUAS</div></div>
        <div><div class="stat-num">3</div><div class="stat-label">PAKET PILIHAN</div></div>
        <div><div class="stat-num">4.9★</div><div class="stat-label">RATA-RATA RATING</div></div>
    </div>
</div>

{{-- ═══════════════════════════════════════
     KEUNGGULAN
════════════════════════════════════════ --}}
<section style="background:#fff; padding:6rem 5%;">
    <div class="section-header text-center mb-5">
        <span class="hero-badge mb-2" style="border-color:var(--gold); color:var(--gold);">Keunggulan LaloeTrip</span>
        <h2 class="hero-title" style="color:var(--dark); font-size:3rem;">Mengapa Memilih<br/>LaloeTrip?</h2>
        <p class="hero-sub mx-auto" style="color:#6a7d90;">Kami berkomitmen memberikan pengalaman terbaik dengan harga yang terjangkau dan pelayanan yang personal.</p>
    </div>

    <div class="keunggulan-grid">
        <div class="keunggulan-card">
            <div class="icon">💰</div>
            <h3>Harga Terjangkau</h3>
            <p>Paket mulai dari Rp 250.000/pax tanpa mengorbankan kualitas</p>
        </div>
        <div class="keunggulan-card">
            <div class="icon">🎯</div>
            <h3>Destinasi Pilihan</h3>
            <p>50+ lokasi estetik dan instagrammable di Lombok</p>
        </div>
        <div class="keunggulan-card">
            <div class="icon">👥</div>
            <h3>Guide Berpengalaman</h3>
            <p>Pemandu lokal yang ramah dan tahu spot-spot terbaik</p>
        </div>
        <div class="keunggulan-card">
            <div class="icon">📱</div>
            <h3>Booking Mudah</h3>
            <p>Booking cepat via WhatsApp, flexible payment system</p>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════
     PAKET WISATA (DYNAMIC FROM DB)
════════════════════════════════════════ --}}
<section class="packages" id="packages" style="background:var(--cream); padding:6rem 5%;">
    <div class="section-header text-center mb-5">
        <span class="hero-badge mb-2" style="border-color:var(--gold); color:var(--gold);">Paket Wisata</span>
        <h2 class="hero-title" style="color:var(--dark); font-size:3rem;">Pilih Paket<br/>Perjalanan Anda</h2>
        <p class="hero-sub mx-auto" style="color:#6a7d90;">Dari fullday trip hingga pengalaman multi-hari, kami menyiapkan paket yang sesuai dengan waktu dan budget Anda.</p>
    </div>

    <div class="pkg-grid">
        @forelse($paketTrips as $paket)
        @php $isFeatured = $loop->index === 1; @endphp

        <div class="pkg-card {{ $isFeatured ? 'featured' : '' }}">

            @if($isFeatured)
                <div class="pkg-badge">TERPOPULER</div>
            @endif

            {{-- Header dengan background gambar dari DB --}}
            <div class="pkg-header" style="
                @if($paket->thumbnail)
                    background-image: url('{{ asset('storage/' . $paket->thumbnail) }}');
                    background-size: cover;
                    background-position: center;
                @endif
            ">
                <div class="pkg-header-dimmer"></div>
                <div class="pkg-header-content">
                    <div class="pkg-name">{{ $paket->nama_paket }}</div>
                    <div class="pkg-duration">{{ $paket->durasi }} • {{ $paket->jenis_paket }}</div>
                </div>
            </div>

            {{-- Harga --}}
            <div class="pkg-price">
                <div class="pkg-price-from">Mulai dari</div>
                <span class="pkg-price-num">Rp {{ number_format($paket->harga, 0, ',', '.') }}</span>
                <span class="pkg-price-unit">/pax</span>
            </div>

            {{-- Deskripsi singkat --}}
            <div class="pkg-desc">
                {{ Str::limit($paket->deskripsi, 100) }}
            </div>

            {{-- CTA --}}
            <div class="pkg-cta-wrap">
                <a href="{{ route('paket.show', $paket->slug) }}" class="pkg-btn-detail">
                    Lihat Detail
                </a>
                <a href="https://wa.me/6285713717336?text=Halo%20LaloeTrip%2C%20saya%20tertarik%20dengan%20{{ urlencode($paket->nama_paket) }}"
                   target="_blank"
                   class="pkg-btn-wa">
                    Book WA
                </a>
            </div>

        </div>
        @empty
        <div style="grid-column:1/-1; text-align:center; padding:3rem; color:#6a7d90;">
            <p style="font-size:1rem;">Paket wisata segera hadir. Hubungi kami untuk info lebih lanjut.</p>
        </div>
        @endforelse
    </div>

    {{-- Tombol lihat semua --}}
    <div class="text-center mt-5">
        <a href="{{ route('paket.paket') }}" class="btn-lihat-semua">
            Lihat Semua Paket →
        </a>
    </div>

    {{-- Info pembayaran --}}
    <div class="info-pembayaran">
        <p><strong style="color:var(--dark)">💡 Info Pembayaran:</strong> Sistem DP — bayar sebagian untuk konfirmasi booking. Sisa pelunasan sebelum keberangkatan. Pembatalan: DP tidak dapat dikembalikan. Harga dikondisikan berdasarkan jumlah peserta.</p>
    </div>
</section>

@endsection

{{-- ═══════════════════════════════════════
     CSS
════════════════════════════════════════ --}}
@push('css')
<style>
:root {
    --gold: #F5A623;
    --dark: #0A1628;
    --cream: #FBF7F0;
}

/* ── HERO ── */
.hero {
    position: relative;
    height: 100vh;
    width: 100%;
    overflow: visible;
    background-color: #fff;
}
.hero-carousel, .carousel-inner, .carousel-item { height: 100vh !important; }
.carousel-item {
    background-size: cover;
    background-position: center;
    transition: opacity 1.2s ease-in-out !important;
}
.hero-dimmer {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.65);
    z-index: 2;
}
.hero-center-wrapper {
    position: absolute;
    inset: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10;
    text-align: center;
    padding: 0 20px;
}
.hero-content > * {
    opacity: 0;
    transform: translateY(25px);
    transition: all 0.7s ease-out;
}
.carousel-item.active .hero-content .hero-badge { opacity:1; transform:translateY(0); transition-delay:0.3s; }
.carousel-item.active .hero-content .hero-title { opacity:1; transform:translateY(0); transition-delay:0.5s; }
.carousel-item.active .hero-content .hero-sub   { opacity:1; transform:translateY(0); transition-delay:0.7s; }
.carousel-item.active .hero-content .hero-btns  { opacity:1; transform:translateY(0); transition-delay:0.9s; }

.hero-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2.5rem, 6vw, 4.5rem);
    color: #fff;
    font-weight: 700;
    line-height: 1.1;
}
.hero-title em { font-style:normal; color:var(--gold); }
.hero-sub { color:rgba(255,255,255,0.9); font-size:1.1rem; max-width:650px; margin:1.5rem auto 0; }
.hero-badge {
    display: inline-block;
    padding: 6px 18px;
    border: 1px solid var(--gold);
    color: var(--gold);
    border-radius: 50px;
    text-transform: uppercase;
    font-size: 0.8rem;
    letter-spacing: 2px;
}
.hero-wave { position:absolute; bottom:-1px; width:100%; z-index:15; }
.custom-nav-icon {
    filter: invert(68%) sepia(87%) saturate(420%) hue-rotate(352deg) brightness(98%) contrast(92%);
    width: 3rem; height: 3rem;
}
.btn-primary { background:var(--gold); color:var(--dark); padding:12px 30px; border-radius:50px; font-weight:600; display:inline-block; }
.btn-outline  { border:2px solid #fff; color:#fff; padding:10px 30px; border-radius:50px; font-weight:600; display:inline-block; }

/* ── STATS BAR ── */
.stats-bar {
    background: var(--dark);
    padding: 1rem 3%;
    position: relative;
    z-index: 10;
    margin-top: 30px;
}
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    text-align: center;
    gap: 1rem;
    max-width: 1200px;
    margin: 0 auto;
}
.stat-num {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem;
    font-weight: 300;
    color: var(--gold);
}
.stat-label {
    font-size: .82rem;
    color: rgba(255,255,255,.55);
    font-weight: 400;
    letter-spacing: .15em;
    margin-top: .2rem;
}

/* ── KEUNGGULAN ── */
.keunggulan-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
    margin-top: 3rem;
}
.keunggulan-card {
    text-align: center;
    padding: 2.5rem 1.8rem;
    background: var(--cream);
    border-radius: 16px;
    transition: all .3s ease;
}
.keunggulan-card:hover { transform: translateY(-10px); }
.keunggulan-card h3 { font-weight:600; color:var(--dark); margin-bottom:.5rem; font-size:1.2rem; }

/* ── PAKET GRID ── */
.pkg-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.8rem;
}
.pkg-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(0,0,0,.06);
    transition: transform .4s, box-shadow .4s;
    display: flex;
    flex-direction: column;
    position: relative;
}
.pkg-card:hover { transform:translateY(-8px); box-shadow:0 16px 50px rgba(0,0,0,.12); }
.pkg-card.featured { border:2px solid var(--gold); }

/* Badge */
.pkg-badge {
    position: absolute;
    top: 1.2rem; right: 1.2rem;
    background: var(--gold);
    color: var(--dark);
    font-size: .72rem;
    font-weight: 700;
    letter-spacing: .08em;
    padding: .3rem .9rem;
    border-radius: 50px;
    z-index: 10;
}

/* Header dengan gambar */
.pkg-header {
    position: relative;
    min-height: 180px;
    display: flex;
    align-items: flex-end;
    padding: 1.5rem;
    background: linear-gradient(135deg, var(--dark), #0D2137);
}
.pkg-header-dimmer {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(10,22,40,.9) 0%, rgba(10,22,40,.35) 100%);
}
.pkg-header-content { position:relative; z-index:2; }
.pkg-name {
    font-family: 'Playfair Display', serif;
    font-size: 1.3rem;
    color: #fff;
    font-weight: 600;
    margin-bottom: .3rem;
}
.pkg-duration { font-size:.78rem; color:rgba(255,255,255,.7); letter-spacing:.04em; }

/* Harga */
.pkg-price {
    padding: 1.2rem 1.5rem;
    border-bottom: 1px solid rgba(0,0,0,.06);
}
.pkg-price-from { font-size:.78rem; color:#9aacbc; margin-bottom:.2rem; }
.pkg-price-num  { font-family:'Playfair Display',serif; font-size:1.8rem; font-weight:700; color:var(--dark); }
.pkg-price-unit { font-size:.8rem; color:#9aacbc; margin-left:.2rem; }

/* Deskripsi */
.pkg-desc {
    padding: 1rem 1.5rem;
    font-size: .85rem;
    color: #6a7d90;
    line-height: 1.6;
    flex: 1;
}

/* CTA */
.pkg-cta-wrap {
    display: flex;
    gap: .7rem;
    padding: 0 1.5rem 1.5rem;
}
.pkg-btn-detail, .pkg-btn-wa {
    flex: 1;
    text-align: center;
    padding: .7rem;
    border-radius: 12px;
    font-weight: 600;
    font-size: .85rem;
    text-decoration: none;
    transition: background .3s;
}
.pkg-btn-detail { background:var(--dark); color:#fff; }
.pkg-btn-detail:hover { background:#1B8FD4; color:#fff; }
.pkg-btn-wa { background:#25D366; color:#fff; }
.pkg-btn-wa:hover { background:#1aaa53; color:#fff; }

/* Tombol lihat semua */
.btn-lihat-semua {
    display: inline-block;
    border: 2px solid var(--dark);
    color: var(--dark);
    padding: .8rem 2.5rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: .9rem;
    text-decoration: none;
    transition: all .3s;
}
.btn-lihat-semua:hover { background:var(--dark); color:#fff; }

/* Info pembayaran */
.info-pembayaran {
    margin-top: 2rem;
    padding: 1.5rem;
    background: rgba(27,143,212,.08);
    border-radius: 14px;
    border-left: 4px solid #1B8FD4;
    font-size: .88rem;
    color: #4e6070;
}

/* ── REVEAL ANIMATION ── */
.reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity .6s ease, transform .6s ease;
}
.reveal.visible {
    opacity: 1;
    transform: translateY(0);
}

/* ── RESPONSIVE ── */
@media (max-width: 768px) {
    .stats-grid      { grid-template-columns: repeat(2,1fr); gap:2rem; }
    .stats-bar       { margin-top: 60px; }
    .keunggulan-grid { grid-template-columns: 1fr; }
    .pkg-grid        { grid-template-columns: 1fr; }
}
</style>
@endpush

{{-- ═══════════════════════════════════════
     JS
════════════════════════════════════════ --}}
@push('js')
<script>
const reveals = document.querySelectorAll('.reveal');
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
            setTimeout(() => entry.target.classList.add('visible'), i * 100);
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0 });
reveals.forEach(el => observer.observe(el));
</script>
@endpush