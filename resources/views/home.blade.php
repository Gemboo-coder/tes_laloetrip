@extends('layouts.layout')

@section('title', 'LaloeTrip — Explore Lombok Like Never Before')

@section('content')

{{-- ═══════════════════════════════════════
     HERO CAROUSEL
════════════════════════════════════════ --}}
<section class="hero" id="home">
    <div id="heroCarousel" class="carousel slide carousel-fade hero-carousel" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner h-100">

            <div class="carousel-item active h-100" style="background-image: url('{{ asset('assets/gili.jpg') }}');"    >
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

        <div class="carousel-indicators hero-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        </div>
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
    <div><div class="stat-num" data-count="{{ $destinasis->count() }}" data-suffix="+">0</div><div class="stat-label">DESTINASI</div></div>
        <div><div class="stat-num" data-count="500" data-suffix="+">0</div><div class="stat-label">TRAVELER PUAS</div></div>
        <div><div class="stat-num" data-count="3" data-suffix="">0</div><div class="stat-label">PAKET PILIHAN</div></div>
        <div><div class="stat-num" data-count="4.9" data-suffix="★" data-decimal="1">0</div><div class="stat-label">RATA-RATA RATING</div></div>
    </div>
</div>

{{-- ═══════════════════════════════════════
     KEUNGGULAN
════════════════════════════════════════ --}}
<section class="section-keunggulan">
    <div class="section-header text-center mb-5 reveal">
        <span class="hero-badge mb-2" style="border-color:var(--gold); color:var(--gold);">Keunggulan LaloeTrip</span>
        <h2 class="section-title">Mengapa Memilih<br/>LaloeTrip?</h2>
        <p class="section-sub">Kami berkomitmen memberikan pengalaman terbaik dengan harga yang terjangkau dan pelayanan yang personal.</p>
    </div>

    <div class="keunggulan-grid">
        <div class="keunggulan-card reveal zoom-in" style="--delay:0">
            <div class="icon">💰</div>
            <h3>Harga Terjangkau</h3>
            <p>Paket mulai dari Rp 250.000/pax tanpa mengorbankan kualitas</p>
        </div>
        <div class="keunggulan-card reveal zoom-in" style="--delay:1">
            <div class="icon">🎯</div>
            <h3>Destinasi Pilihan</h3>
            <p>50+ lokasi estetik dan instagrammable di Lombok</p>
        </div>
        <div class="keunggulan-card reveal zoom-in" style="--delay:2">
            <div class="icon">👥</div>
            <h3>Guide Berpengalaman</h3>
            <p>Pemandu lokal yang ramah dan tahu spot-spot terbaik</p>
        </div>
        <div class="keunggulan-card reveal zoom-in" style="--delay:3">
            <div class="icon">📱</div>
            <h3>Booking Mudah</h3>
            <p>Booking cepat via WhatsApp, flexible payment system</p>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════
     PAKET WISATA (DYNAMIC FROM DB)
════════════════════════════════════════ --}}
<section class="section-packages" id="packages">
    <div class="section-header text-center mb-5 reveal">
        <span class="hero-badge mb-2" style="border-color:var(--gold); color:var(--gold);">Paket Wisata</span>
        <h2 class="section-title">Pilih Paket<br/>Perjalanan Anda</h2>
        <p class="section-sub">Dari fullday trip hingga pengalaman multi-hari, kami menyiapkan paket yang sesuai dengan waktu dan budget Anda.</p>
    </div>

    <div class="pkg-grid">
        @forelse($paketTrips as $paket)
        @php $isFeatured = $loop->index === 1; @endphp

        <div class="pkg-card {{ $isFeatured ? 'featured' : '' }} reveal zoom-in" style="--delay:{{ $loop->index }}">

            @if($isFeatured)
                <div class="pkg-badge">TERPOPULER</div>
            @endif

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

            <div class="pkg-price">
                <div class="pkg-price-from">Mulai dari</div>
                <span class="pkg-price-num" data-price="{{ $paket->harga }}">Rp 0</span>
                <span class="pkg-price-unit">/pax</span>
            </div>

            <div class="pkg-desc">{{ Str::limit($paket->deskripsi, 100) }}</div>

            <div class="pkg-cta-wrap">
                <a href="{{ route('paket.show', $paket->slug) }}" class="pkg-btn-detail">Lihat Detail</a>
                <a href="https://wa.me/6285713717336?text=Halo%20LaloeTrip%2C%20saya%20tertarik%20dengan%20{{ urlencode($paket->nama_paket) }}"
                   target="_blank" class="pkg-btn-wa">Book WA</a>
            </div>

        </div>
        @empty
        <div style="grid-column:1/-1; text-align:center; padding:3rem; color:#6a7d90;">
            <p>Paket wisata segera hadir. Hubungi kami untuk info lebih lanjut.</p>
        </div>
        @endforelse
    </div>

    <div class="text-center mt-5 reveal">
        <a href="{{ route('paket.paket') }}" class="btn-lihat-semua">
            Lihat Semua Paket <span class="arrow">→</span>
        </a>
    </div>

    <div class="info-pembayaran reveal">
        <p><strong style="color:var(--dark)">💡 Info Pembayaran:</strong> Sistem DP — bayar sebagian untuk konfirmasi booking. Sisa pelunasan sebelum keberangkatan. Pembatalan: DP tidak dapat dikembalikan. Harga dikondisikan berdasarkan jumlah peserta.</p>
    </div>
</section>

{{-- ═══════════════════════════════════════
     DESTINASI WISATA (DYNAMIC FROM DB)
════════════════════════════════════════ --}}
<section class="section-destinasi" id="destinasi">
    <div class="section-header text-center mb-5 reveal">
        <span class="hero-badge mb-2" style="border-color:var(--gold); color:var(--gold);">Destinasi Wisata</span>
        <h2 class="section-title" style="color:#fff;">Jelajahi Keindahan<br/><em>Lombok</em></h2>
        <p class="section-sub" style="color:rgba(255,255,255,.7);">50+ destinasi eksotis menanti — dari pantai tersembunyi hingga puncak gunung berapi yang memukau.</p>
    </div>

    <div class="dest-grid">
        @forelse($destinasis->take(3) as $dest)
        <a href="{{ route('destinasi.show', $dest->slug) }}" class="dest-card reveal zoom-in" style="--delay:{{ $loop->index }}">
            <div class="dest-card-img-wrap">
                @if($dest->gambar)
                    <img src="{{ asset('storage/' . $dest->gambar) }}"
                         alt="{{ $dest->nama_destinasi }}"
                         class="dest-card-img">
                @else
                    <div class="dest-card-placeholder">🏝️</div>
                @endif
                <span class="dest-kategori">{{ $dest->kategori }}</span>
                <div class="dest-card-overlay">
                    <span>Lihat Detail →</span>
                </div>
            </div>
            <div class="dest-card-body">
                <h3 class="dest-nama">{{ $dest->nama_destinasi }}</h3>
                <p class="dest-desc">{{ Str::limit($dest->deskripsi, 80) }}</p>
            </div>
        </a>
        @empty
        <div style="grid-column:1/-1; text-align:center; padding:3rem; color:rgba(255,255,255,.6);">
            <p>Destinasi segera hadir.</p>
        </div>
        @endforelse
    </div>

    <div class="text-center mt-5 reveal">
        <a href="{{ route('destinasi.index') }}" class="btn-lihat-semua-dest">
            Lihat Semua Destinasi <span class="arrow">→</span>
        </a>
    </div>
</section>

{{-- ═══════════════════════════════════════
     CONTOH ITINERARY
════════════════════════════════════════ --}}
<section class="section-itinerary">
    <div class="itinerary-inner">

        {{-- KIRI: INCLUDES --}}
        <div class="itinerary-left reveal">
            <span class="hero-badge mb-3" style="border-color:#1B8FD4; color:#1B8FD4;">Contoh Itinerary</span>
            <h2 class="itinerary-title">Apa Saja yang<br/>Anda Dapatkan?</h2>

            <div class="itinerary-includes">
                <h4 class="includes-label">Paket 3D2N Includes:</h4>
                <ul class="includes-list">
                    <li>2 malam akomodasi nyaman</li>
                    <li>Guide lokal berpengalaman</li>
                    <li>Transport all-inclusive</li>
                    <li>6x makan sehari-hari</li>
                    <li>Aktivitas sesuai itinerary</li>
                    <li>Dokumentasi foto profesional</li>
                    <li>E-ticket &amp; voucher otomatis</li>
                    <li>Asuransi perjalanan</li>
                </ul>
                <a href="https://wa.me/6285713717336" target="_blank" class="itinerary-cta-btn">
                    Pesan Sekarang
                </a>
            </div>
        </div>

        {{-- KANAN: TIMELINE --}}
        <div class="itinerary-right reveal">
            <h4 class="timeline-label">Timeline Hari Pertama:</h4>
            <div class="timeline">

                <div class="timeline-item">
                    <div class="timeline-time" style="background:#F5A623;">08:00</div>
                    <div class="timeline-content">
                        <div class="timeline-event">Jemput di Hotel</div>
                        <div class="timeline-desc">Kami menjemput Anda di hotel dan memulai petualangan seru hari ini</div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-time" style="background:#1B8FD4;">10:00</div>
                    <div class="timeline-content">
                        <div class="timeline-event">Pantai Pink</div>
                        <div class="timeline-desc">Nikmati keindahan pantai berpasir pink yang unik dan eksotis</div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-time" style="background:#28a745;">13:00</div>
                    <div class="timeline-content">
                        <div class="timeline-event">Makan Siang</div>
                        <div class="timeline-desc">Menikmati hidangan lokal lezat di restoran pilihan</div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-time" style="background:#e07a2f;">17:00</div>
                    <div class="timeline-content">
                        <div class="timeline-event">Sunset di Bukit Terasi</div>
                        <div class="timeline-desc">Saksikan sunset spektakuler dari ketinggian yang menakjubkan</div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-time" style="background:#0A1628;">19:00</div>
                    <div class="timeline-content">
                        <div class="timeline-event">Dinner &amp; Istirahat</div>
                        <div class="timeline-desc">Makan malam bersama lalu kembali ke akomodasi untuk beristirahat</div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════
     JENIS TRIP
════════════════════════════════════════ --}}
<section class="section-jenis-trip">
    <div class="jenis-trip-header reveal">
        <h2 class="itinerary-title">Apa yang Ingin<br/>Anda Jelajahi?</h2>
        <p style="color:#6a7d90; font-size:.95rem; margin-top:.5rem; max-width:500px;">
            Kami menawarkan berbagai jenis trip yang bisa disesuaikan dengan minat dan gaya perjalanan Anda.
        </p>
    </div>

    <div class="jenis-grid">
        @php
        $jenisMap = [
            'Open Trip'     => ['icon' => '🧑‍🤝‍🧑', 'desc' => 'Bergabung dengan peserta lain dalam satu group trip yang seru. Cocok untuk solo traveler yang ingin bertemu teman baru.'],
            'Private Trip'  => ['icon' => '👑', 'desc' => 'Nikmati perjalanan eksklusif hanya bersama kelompok Anda. Itinerary bisa dikustomisasi sepenuhnya sesuai keinginan.'],
            'Family Trip'   => ['icon' => '👨‍👩‍👧‍👦', 'desc' => 'Liburan seru bersama keluarga dengan itinerary yang ramah anak dan nyaman untuk semua usia.'],
        ];
        @endphp

        @foreach($kategoriPaket as $i => $jenis)
        @php $info = $jenisMap[$jenis] ?? ['icon' => '🏝️', 'desc' => 'Jelajahi Lombok dengan paket ' . $jenis . ' terbaik dari kami.']; @endphp
        <a href="{{ route('paket.paket') }}" class="jenis-card reveal zoom-in" style="--delay:{{ $i }}">
            <div class="jenis-icon">{{ $info['icon'] }}</div>
            <h3 class="jenis-nama">{{ $jenis }}</h3>
            <p class="jenis-desc">{{ $info['desc'] }}</p>
        </a>
        @endforeach
    </div>
</section>

{{-- ═══════════════════════════════════════
     CARA BOOKING
════════════════════════════════════════ --}}
<section class="section-cara-booking">
    <div class="cara-booking-header reveal">
        <span class="hero-badge mb-2" style="border-color:var(--gold); color:var(--gold);">Cara Booking</span>
        <h2 class="itinerary-title" style="color:#fff;">3 Langkah Mudah<br/>Booking Trip Anda</h2>
    </div>

    <div class="cara-grid">
        <div class="cara-step reveal zoom-in" style="--delay:0">
            <div class="step-circle" style="background:#F5A623;">1</div>
            <h3 class="step-title">Pilih Paket</h3>
            <p class="step-desc">Pilih paket trip yang sesuai dengan keinginan dan budget Anda. Hubungi kami via WhatsApp jika butuh rekomendasi.</p>
        </div>

        <div class="cara-step reveal zoom-in" style="--delay:1">
            <div class="step-circle" style="background:#1B8FD4;">2</div>
            <h3 class="step-title">Bayar DP</h3>
            <p class="step-desc">Lakukan pembayaran DP untuk konfirmasi booking. Kami akan mengirim bukti booking dan itinerary detail.</p>
        </div>

        <div class="cara-step reveal zoom-in" style="--delay:2">
            <div class="step-circle" style="background:#28a745;">3</div>
            <h3 class="step-title">Berangkat!</h3>
            <p class="step-desc">Selesaikan pelunasan, terima e-ticket, dan bersiaplah untuk petualangan terbaik Anda bersama kami!</p>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════
     KONTAK KAMI
════════════════════════════════════════ --}}
<section class="section-kontak" id="kontak">
    <div class="kontak-inner">

        {{-- KIRI: INFO --}}
        <div class="kontak-left reveal">
            <span class="hero-badge mb-2" style="border-color:#1B8FD4; color:#1B8FD4;">Kontak Kami</span>
            <h2 class="itinerary-title">Temukan &amp; Hubungi<br/>LaloeTrip</h2>

            <div class="kontak-list">
                <div class="kontak-item">
                    <div class="kontak-icon">📍</div>
                    <div class="kontak-item-body">
                        <div class="kontak-label">Alamat</div>
                        <div class="kontak-value">Mataram, Nusa Tenggara Barat, Indonesia</div>
                    </div>
                </div>

                <div class="kontak-item">
                    <div class="kontak-icon">💬</div>
                    <div class="kontak-item-body">
                        <div class="kontak-label">WhatsApp</div>
                        <div class="kontak-value">+62 857-1371-7336</div>
                    </div>
                </div>

                <div class="kontak-item">
                    <div class="kontak-icon">📷</div>
                    <div class="kontak-item-body">
                        <div class="kontak-label">Instagram</div>
                        <div class="kontak-value">@laloetrip_lombok</div>
                    </div>
                </div>

                <div class="kontak-item">
                    <div class="kontak-icon">✉️</div>
                    <div class="kontak-item-body">
                        <div class="kontak-label">Email</div>
                        <div class="kontak-value">hello@laloetrip.com</div>
                    </div>
                </div>
            </div>

            <div class="kontak-jam">
                <strong>Jam Operasional CS:</strong>
                <p>Senin – Minggu: 08.00 – 22.00 WITA</p>
                <p>Respons WhatsApp: Maks. 1 jam</p>
            </div>
        </div>

        {{-- KANAN: MAP --}}
        <div class="kontak-right reveal">
            <div class="kontak-map-wrap">
                <iframe
                    src="https://www.google.com/maps?q=Mataram,%20Nusa%20Tenggara%20Barat,%20Indonesia&output=embed"
                    width="100%" height="100%" style="border:0;"
                    allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

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

/* ═══ HERO ═══ */
.hero {
    position: relative;
    height: 100vh;
    height: 100svh;
    width: 100%;
    overflow: visible;
    background-color: #fff;
}
.hero-carousel, .carousel-inner, .carousel-item {
    height: 100vh !important;
    height: 100svh !important;
}
.carousel-item {
    background-size: cover;
    background-position: center;
    transform: scale(1.06);
    transition: opacity 1.2s ease-in-out, transform 1.6s ease-in-out !important;
}
.carousel-item.active { transform: scale(1); }
.hero-dimmer {
    position: absolute; inset: 0;
    background: rgba(0,0,0,0.65); z-index: 2;
}
.hero-center-wrapper {
    position: absolute; inset: 0;
    display: flex; justify-content: center; align-items: center;
    z-index: 10; text-align: center; padding: 0 20px;
}
.hero-content > * {
    opacity: 0; transform: translateY(25px);
    transition: all 0.7s ease-out;
}
#heroCarousel.is-ready .carousel-item.active .hero-content .hero-badge { opacity:1; transform:translateY(0); transition-delay:0.3s; }
#heroCarousel.is-ready .carousel-item.active .hero-content .hero-title { opacity:1; transform:translateY(0); transition-delay:0.5s; }
#heroCarousel.is-ready .carousel-item.active .hero-content .hero-sub   { opacity:1; transform:translateY(0); transition-delay:0.7s; }
#heroCarousel.is-ready .carousel-item.active .hero-content .hero-btns  { opacity:1; transform:translateY(0); transition-delay:0.9s; }
.hero-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2.5rem, 6vw, 4.5rem);
    color: #fff; font-weight: 700; line-height: 1.15;
}
.hero-title em { font-style:normal; color:var(--gold); }
.hero-sub { color:rgba(255,255,255,0.9); font-size:1.1rem; max-width:650px; margin:1.5rem auto 0; }
.hero-badge {
    display: inline-block; padding: 6px 18px;
    border: 1px solid var(--gold); color: var(--gold);
    border-radius: 50px; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 2px;
}
.hero-wave { position:absolute; bottom:-1px; width:100%; z-index:15; }
.custom-nav-icon {
    filter: invert(68%) sepia(87%) saturate(420%) hue-rotate(352deg) brightness(98%) contrast(92%);
    width: 3rem; height: 3rem;
}
.hero-indicators { bottom: 90px; z-index: 20; }
.hero-indicators [data-bs-target] {
    width: 8px; height: 8px; border-radius: 50%;
    background: rgba(255,255,255,0.5); border: none; transition: background .3s, width .3s;
}
.hero-indicators .active { background: var(--gold); width: 24px; border-radius: 4px; }
.btn-primary {
    background: var(--gold); color: var(--dark);
    padding: 12px 30px; border-radius: 50px; font-weight: 600; display: inline-block;
    transition: transform .25s, box-shadow .25s;
}
.btn-outline {
    border: 2px solid #fff; color: #fff;
    padding: 10px 30px; border-radius: 50px; font-weight: 600; display: inline-block;
    transition: transform .25s, box-shadow .25s;
}
.btn-primary:hover, .btn-outline:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(245,166,35,.35); }

/* ═══ STATS BAR ═══ */
.stats-bar { background: var(--dark); padding: 1rem 3%; position: relative; z-index: 10; margin-top: 30px; }
.stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); text-align: center; gap: 1rem; max-width: 1200px; margin: 0 auto; }
.stat-num { font-family: 'Playfair Display', serif; font-size: 2.5rem; font-weight: 300; color: var(--gold); }
.stat-label { font-size: .82rem; color: rgba(255,255,255,.55); font-weight: 400; letter-spacing: .15em; margin-top: .2rem; }

/* ═══ SECTION HELPERS ═══ */
.section-title { font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 700; color: var(--dark); line-height: 1.15; }
.section-title em { font-style: normal; color: var(--gold); }
.section-sub { color: #6a7d90; font-size: 1rem; max-width: 560px; margin: 0 auto; }

/* ═══ KEUNGGULAN ═══ */
.section-keunggulan { background: #fff; padding: 6rem 5%; }
.keunggulan-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.5rem; margin-top: 3rem; }
.keunggulan-card {
    text-align: center; padding: 2.5rem 1.8rem;
    background: var(--cream); border-radius: 16px;
    transition: transform .35s ease, box-shadow .35s ease;
}
.keunggulan-card:hover { transform: translateY(-10px) scale(1.02); box-shadow: 0 18px 35px rgba(10,22,40,.1); }
.keunggulan-card .icon { font-size: 2rem; margin-bottom: .75rem; display: inline-block; transition: transform .35s ease; }
.keunggulan-card:hover .icon { transform: scale(1.2) rotate(-6deg); }
.keunggulan-card h3 { font-weight:600; color:var(--dark); margin-bottom:.5rem; font-size:1.2rem; }
.keunggulan-card p  { color: #6a7d90; font-size: .9rem; line-height: 1.6; margin: 0; }

/* ═══ PAKET GRID ═══ */
.section-packages { background: var(--cream); padding: 6rem 5%; }
.pkg-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.8rem; }
.pkg-card {
    background: #fff; border-radius: 20px; overflow: hidden;
    box-shadow: 0 4px 24px rgba(0,0,0,.06);
    transition: transform .4s, box-shadow .4s;
    display: flex; flex-direction: column; position: relative;
}
.pkg-card:hover { transform:translateY(-8px); box-shadow:0 16px 50px rgba(0,0,0,.12); }
.pkg-card.featured { border:2px solid var(--gold); }
.pkg-badge {
    position: absolute; top: 1.2rem; right: 1.2rem;
    background: var(--gold); color: var(--dark);
    font-size: .72rem; font-weight: 700; letter-spacing: .08em;
    padding: .3rem .9rem; border-radius: 50px; z-index: 10;
    animation: badgePulse 2s ease-in-out infinite;
}
@keyframes badgePulse { 0%,100%{transform:scale(1)} 50%{transform:scale(1.08)} }
.pkg-header {
    position: relative; min-height: 180px;
    display: flex; align-items: flex-end; padding: 1.5rem;
    background: linear-gradient(135deg, var(--dark), #0D2137);
    transition: background-size .6s ease; background-size: 100%;
}
.pkg-card:hover .pkg-header { background-size: 112% !important; }
.pkg-header-dimmer { position:absolute; inset:0; background:linear-gradient(to top, rgba(10,22,40,.9) 0%, rgba(10,22,40,.35) 100%); }
.pkg-header-content { position:relative; z-index:2; }
.pkg-name { font-family:'Playfair Display',serif; font-size:1.3rem; color:#fff; font-weight:600; margin-bottom:.3rem; }
.pkg-duration { font-size:.78rem; color:rgba(255,255,255,.7); letter-spacing:.04em; }
.pkg-price { padding:1.2rem 1.5rem; border-bottom:1px solid rgba(0,0,0,.06); }
.pkg-price-from { font-size:.78rem; color:#9aacbc; margin-bottom:.2rem; }
.pkg-price-num { font-family:'Playfair Display',serif; font-size:1.8rem; font-weight:700; color:var(--dark); }
.pkg-price-unit { font-size:.8rem; color:#9aacbc; margin-left:.2rem; }
.pkg-desc { padding:1rem 1.5rem; font-size:.85rem; color:#6a7d90; line-height:1.6; flex:1; }
.pkg-cta-wrap { display:flex; gap:.7rem; padding:0 1.5rem 1.5rem; }
.pkg-btn-detail, .pkg-btn-wa {
    flex:1; text-align:center; padding:.7rem; border-radius:12px;
    font-weight:600; font-size:.85rem; text-decoration:none;
    transition:background .3s, transform .25s;
}
.pkg-btn-detail:hover, .pkg-btn-wa:hover { transform:translateY(-2px); }
.pkg-btn-detail { background:var(--dark); color:#fff; }
.pkg-btn-detail:hover { background:#1B8FD4; color:#fff; }
.pkg-btn-wa { background:var(--gold); color:var(--dark); }
.pkg-btn-wa:hover { background:#d4890e; color:var(--dark); }    
.btn-lihat-semua {
    display: inline-block; border:2px solid var(--dark); color:var(--dark);
    padding:.8rem 2.5rem; border-radius:50px; font-weight:600; font-size:.9rem;
    text-decoration:none; transition:all .3s;
}
.btn-lihat-semua .arrow { display:inline-block; transition:transform .3s ease; margin-left:.25rem; }
.btn-lihat-semua:hover { background:var(--dark); color:#fff; transform:translateY(-3px); }
.btn-lihat-semua:hover .arrow { transform:translateX(5px); }
.info-pembayaran {
    margin-top:2rem; padding:1.5rem;
    background:rgba(27,143,212,.08); border-radius:14px;
    border-left:4px solid #1B8FD4; font-size:.88rem; color:#4e6070;
}

/* ═══ DESTINASI SECTION ═══ */
.section-destinasi {
    background: linear-gradient(135deg, var(--dark) 0%, #0D2137 60%, #142840 100%);
    padding: 6rem 5%;
    position: relative;
    overflow: hidden;
}
.section-destinasi::before {
    content: '';
    position: absolute; top: -100px; right: -100px;
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(245,166,35,.08) 0%, transparent 70%);
    pointer-events: none;
}
.dest-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.8rem;
    position: relative;
    z-index: 1;
}
.dest-card {
    background: rgba(255,255,255,.05);
    border: 1px solid rgba(255,255,255,.08);
    border-radius: 20px;
    overflow: hidden;
    text-decoration: none;
    transition: transform .35s ease, box-shadow .35s ease, border-color .35s;
    display: flex;
    flex-direction: column;
}
.dest-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0,0,0,.3);
    border-color: rgba(245,166,35,.4);
}
.dest-card-img-wrap {
    position: relative; height: 220px;
    background: linear-gradient(135deg, #0D2137, #142840);
    overflow: hidden;
}
.dest-card-img {
    width: 100%; height: 100%;
    object-fit: cover; display: block;
    transition: transform .5s ease;
}
.dest-card:hover .dest-card-img { transform: scale(1.06); }
.dest-card-placeholder {
    width: 100%; height: 100%;
    display: flex; align-items: center; justify-content: center; font-size: 3rem;
}
.dest-kategori {
    position: absolute; top: 1rem; left: 1rem;
    background: rgba(10,22,40,.85); color: #fff;
    font-size: .72rem; font-weight: 600; letter-spacing: .08em;
    padding: .3rem .9rem; border-radius: 50px; z-index: 5;
}
.dest-card-overlay {
    position: absolute; inset: 0;
    background: rgba(10,22,40,.6);
    display: flex; align-items: center; justify-content: center;
    opacity: 0; transition: opacity .3s ease;
}
.dest-card:hover .dest-card-overlay { opacity: 1; }
.dest-card-overlay span {
    background: var(--gold); color: var(--dark);
    padding: .6rem 1.5rem; border-radius: 50px;
    font-weight: 600; font-size: .85rem;
}
.dest-card-body { padding: 1.5rem 1.8rem; flex: 1; }
.dest-nama {
    font-family: 'Playfair Display', serif;
    font-size: 1.2rem; font-weight: 700; color: #fff;
    margin-bottom: .5rem;
}
.dest-desc { font-size: .85rem; color: rgba(255,255,255,.6); line-height: 1.6; margin: 0; }
.btn-lihat-semua-dest {
    display: inline-block;
    border: 2px solid rgba(255,255,255,.3); color: #fff;
    padding: .8rem 2.5rem; border-radius: 50px;
    font-weight: 600; font-size: .9rem; text-decoration: none;
    transition: all .3s; position: relative; z-index: 1;
}
.btn-lihat-semua-dest .arrow { display:inline-block; transition:transform .3s ease; margin-left:.25rem; }
.btn-lihat-semua-dest:hover { background: var(--gold); border-color: var(--gold); color: var(--dark); transform: translateY(-3px); }
.btn-lihat-semua-dest:hover .arrow { transform: translateX(5px); }

/* ═══ REVEAL ═══ */
.reveal {
    opacity: 0; transform: scale(0.85) translateY(24px);
    transition: opacity .7s cubic-bezier(.22,1,.36,1), transform .7s cubic-bezier(.22,1,.36,1);
    transition-delay: calc(var(--delay, 0) * 0.12s);
    will-change: opacity, transform;
}
.reveal.visible { opacity: 1; transform: scale(1) translateY(0); }
.reveal.zoom-in { transform: scale(0.7) translateY(20px); transition-delay: calc(var(--delay, 0) * 0.15s); }
.reveal.zoom-in.visible { transform: scale(1) translateY(0); }

/* ═══ ITINERARY ═══ */
.section-itinerary {
    background: #fff;
    padding: 6rem 5%;
}
.itinerary-inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 5rem;
    align-items: start;
    max-width: 1100px;
    margin: 0 auto;
}
.itinerary-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.8rem;
    font-weight: 700;
    color: var(--dark);
    line-height: 1.15;
    margin: .8rem 0 2rem;
}
.itinerary-includes {
    background: var(--cream);
    border-radius: 20px;
    padding: 2rem;
}
.includes-label {
    font-size: 1rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 1.2rem;
}
.includes-list {
    list-style: none;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: .7rem;
    margin-bottom: 1.8rem;
}
.includes-list li {
    display: flex;
    align-items: center;
    gap: .7rem;
    font-size: .9rem;
    color: #4e6070;
}
.includes-list li::before {
    content: "✓";
    color: #28a745;
    font-weight: 700;
    font-size: .9rem;
    flex-shrink: 0;
}
.itinerary-cta-btn {
    display: inline-block;
    background: var(--gold);
    color: var(--dark);
    padding: .8rem 2rem;
    border-radius: 50px;
    font-weight: 700;
    font-size: .9rem;
    text-decoration: none;
    transition: all .3s;
}
.itinerary-cta-btn:hover { background: #d4890e; transform: translateY(-3px); color: var(--dark); }

.timeline-label {
    font-size: 1rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 1.5rem;
    padding-top: 5.5rem; /* sejajar dengan card includes di kiri */
}
.timeline {
    display: flex;
    flex-direction: column;
    gap: 1.2rem;
}
.timeline-item {
    display: flex;
    align-items: flex-start;
    gap: 1.2rem;
}
.timeline-time {
    min-width: 64px;
    height: 64px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: .85rem;
    color: #fff;
    flex-shrink: 0;
    letter-spacing: .05em;
}
.timeline-content { padding-top: .3rem; }
.timeline-event {
    font-weight: 700;
    color: var(--dark);
    font-size: .95rem;
    margin-bottom: .2rem;
}
.timeline-desc {
    font-size: .82rem;
    color: #6a7d90;
    line-height: 1.5;
}

/* ═══ JENIS TRIP ═══ */
.section-jenis-trip {
    background: #fff;
    padding: 6rem 5%;
}
.jenis-trip-header {
    margin-bottom: 3rem;
}
.jenis-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
}
.jenis-card {
    background: var(--cream);
    border-radius: 20px;
    padding: 2.2rem 2rem;
    text-decoration: none;
    transition: transform .35s ease, box-shadow .35s ease, background .3s;
    display: block;
    border: 1.5px solid transparent;
}
.jenis-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 40px rgba(0,0,0,.08);
    border-color: var(--gold);
    background: #fff;
}
.jenis-icon {
    font-size: 2.2rem;
    margin-bottom: 1.2rem;
    width: 56px; height: 56px;
    background: rgba(245,166,35,.12);
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
}
.jenis-nama {
    font-family: 'Playfair Display', serif;
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: .5rem;
}
.jenis-desc {
    font-size: .85rem;
    color: #6a7d90;
    line-height: 1.6;
    margin: 0;
}

/* ═══ CARA BOOKING ═══ */
.section-cara-booking {
    background: linear-gradient(135deg, var(--dark) 0%, #0D2137 60%, #142840 100%);
    padding: 6rem 5%;
    position: relative;
    overflow: hidden;
}
.section-cara-booking::before {
    content: '';
    position: absolute; top: -120px; left: -120px;
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(245,166,35,.08) 0%, transparent 70%);
    pointer-events: none;
}
.cara-booking-header {
    position: relative;
    z-index: 1;
    max-width: 700px;
    margin: 0 auto 4rem;
    text-align: center;
}
.cara-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
    max-width: 1100px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}
.cara-step {
    text-align: center;
    padding: 0 1rem;
}
.step-circle {
    width: 84px;
    height: 84px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-family: 'Playfair Display', serif;
    font-size: 2.2rem;
    font-weight: 700;
    color: #fff;
    box-shadow: 0 12px 30px rgba(0,0,0,.25);
    transition: transform .35s ease;
}
.cara-step:hover .step-circle { transform: scale(1.08) translateY(-4px); }
.step-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.2rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: .6rem;
}
.step-desc {
    font-size: .88rem;
    color: rgba(255,255,255,.65);
    line-height: 1.65;
    max-width: 320px;
    margin: 0 auto;
}

/* ═══ KONTAK KAMI ═══ */
.section-kontak {
    background: var(--cream);
    padding: 6rem 5%;
}
.kontak-inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 5rem;
    align-items: start;
    max-width: 1200px;
    margin: 0 auto;
}
.kontak-list {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    margin-top: 2.5rem;
}
.kontak-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}
.kontak-icon {
    width: 44px;
    height: 44px;
    min-width: 44px;
    border-radius: 12px;
    background: var(--dark);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
}
.kontak-label {
    font-size: .72rem;
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: #9aacbc;
    margin-bottom: .2rem;
}
.kontak-value {
    font-size: .98rem;
    font-weight: 600;
    color: var(--dark);
}
.kontak-jam {
    margin-top: 2.5rem;
    padding: 1.5rem 1.8rem;
    background: #eef1f3;
    border-left: 4px solid var(--dark);
    border-radius: 14px;
}
.kontak-jam strong {
    display: block;
    color: var(--dark);
    font-size: .95rem;
    margin-bottom: .5rem;
}
.kontak-jam p {
    font-size: .85rem;
    color: #6a7d90;
    margin: 0;
    line-height: 1.6;
}
.kontak-map-wrap {
    position: relative;
    width: 100%;
    height: 420px;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 12px 40px rgba(10,22,40,.12);
}
.kontak-map-wrap iframe {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

/* ═══ RESPONSIVE ═══ */
@media (max-width: 768px) {
    .stats-bar { margin-top: 50px; }
    .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 1.5rem; }
    .stat-num { font-size: 1.9rem; }
    .section-title { font-size: 2rem; }
    .keunggulan-grid { grid-template-columns: 1fr 1fr; gap: 1rem; margin-top: 2rem; }
    .pkg-grid { grid-template-columns: 1fr; gap: 1.4rem; }
    .dest-grid { grid-template-columns: 1fr; gap: 1.4rem; }
    .itinerary-inner { grid-template-columns: 1fr; gap: 2.5rem; }
    .itinerary-title { font-size: 2rem; }
    .jenis-grid { grid-template-columns: 1fr; gap: 1rem; }
    .cara-grid { grid-template-columns: 1fr; gap: 2.5rem; }
    .kontak-inner { grid-template-columns: 1fr; gap: 2.5rem; }
    .kontak-map-wrap { min-height: 320px; }
    .hero, .hero-carousel, .carousel-inner, .carousel-item { height: 75vh !important; min-height: 480px; }
    .hero-btns { display:flex; flex-direction:column; align-items:center; gap:.75rem; margin-top:1.25rem !important; }
    .btn-primary, .btn-outline { width:100%; max-width:280px; text-align:center; }
    .btn-outline { margin-left:0 !important; }
}
@media (max-width: 420px) {
    .keunggulan-grid { grid-template-columns: 1fr; }
    .section-title { font-size: 1.75rem; }
}
@media (prefers-reduced-motion: reduce) {
    .reveal, .reveal.zoom-in { transition:none !important; animation:none !important; opacity:1; transform:none; }
    .carousel-item { transform:none !important; }
}
</style>
@endpush

{{-- ═══════════════════════════════════════
     JS
════════════════════════════════════════ --}}
@push('js')
<script>
document.addEventListener('DOMContentLoaded', function () {

    // Reveal on scroll
    var reveals = document.querySelectorAll('.reveal');
    if (reveals.length) {
        var revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.05, rootMargin: '0px 0px -40px 0px' });
        reveals.forEach(function (el) {
            var rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                el.classList.add('visible');
                revealObserver.unobserve(el);
            } else {
                revealObserver.observe(el);
            }
        });
    }

    // Animated counter — stats
    function animateCount(el) {
        var target = parseFloat(el.dataset.count);
        var suffix = el.dataset.suffix || '';
        var decimal = parseInt(el.dataset.decimal || '0', 10);
        var duration = 1500;
        var start = performance.now();
        function tick(now) {
            var progress = Math.min((now - start) / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = (target * eased).toFixed(decimal) + suffix;
            if (progress < 1) requestAnimationFrame(tick);
            else el.textContent = target.toFixed(decimal) + suffix;
        }
        requestAnimationFrame(tick);
    }
    var statNums = document.querySelectorAll('.stat-num');
    if (statNums.length) {
        var statObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) { animateCount(entry.target); statObserver.unobserve(entry.target); }
            });
        }, { threshold: 0.4 });
        statNums.forEach(function (el) { statObserver.observe(el); });
    }

    // Animated counter — harga
    function animatePrice(el) {
        var target = parseInt(el.dataset.price, 10) || 0;
        var duration = 1200;
        var start = performance.now();
        function tick(now) {
            var progress = Math.min((now - start) / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = 'Rp ' + Math.round(target * eased).toLocaleString('id-ID');
            if (progress < 1) requestAnimationFrame(tick);
            else el.textContent = 'Rp ' + target.toLocaleString('id-ID');
        }
        requestAnimationFrame(tick);
    }
    var priceNums = document.querySelectorAll('.pkg-price-num[data-price]');
    if (priceNums.length) {
        var priceObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) { animatePrice(entry.target); priceObserver.unobserve(entry.target); }
            });
        }, { threshold: 0.4 });
        priceNums.forEach(function (el) { priceObserver.observe(el); });
    }

    // Hero carousel
    var carouselEl = document.getElementById('heroCarousel');
    if (carouselEl) {
        var hasBS = (typeof window.bootstrap !== 'undefined' && window.bootstrap.Carousel);
        if (!hasBS) {
            var items = carouselEl.querySelectorAll('.carousel-item');
            var dots = carouselEl.querySelectorAll('.hero-indicators [data-bs-slide-to]');
            var current = 0;
            function goTo(i) {
                i = (i + items.length) % items.length;
                items.forEach(function(it, idx) { it.classList.toggle('active', idx === i); });
                dots.forEach(function(d, idx) { d.classList.toggle('active', idx === i); });
                current = i;
            }
            var timer = setInterval(function() { goTo(current + 1); }, 5000);
            carouselEl.querySelector('.carousel-control-prev')?.addEventListener('click', function(e) { e.preventDefault(); goTo(current - 1); clearInterval(timer); timer = setInterval(function() { goTo(current + 1); }, 5000); });
            carouselEl.querySelector('.carousel-control-next')?.addEventListener('click', function(e) { e.preventDefault(); goTo(current + 1); clearInterval(timer); timer = setInterval(function() { goTo(current + 1); }, 5000); });
        } else {
            var bsC = window.bootstrap.Carousel.getOrCreateInstance(carouselEl);
            var sx = 0;
            carouselEl.addEventListener('touchstart', function(e) { sx = e.changedTouches[0].screenX; }, {passive:true});
            carouselEl.addEventListener('touchend', function(e) { var d = sx - e.changedTouches[0].screenX; if(Math.abs(d)<50) return; d>0?bsC.next():bsC.prev(); }, {passive:true});
        }
        requestAnimationFrame(function() { requestAnimationFrame(function() { carouselEl.classList.add('is-ready'); }); });
    }

});
</script>
@endpush