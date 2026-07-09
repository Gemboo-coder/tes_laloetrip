@extends('layouts.layout')

@section('title', 'Tentang Kami — LaloeTrip')

@section('content')

{{-- ═══════════════════════════════════════
     PAGE HERO
════════════════════════════════════════ --}}
<section class="about-hero">
    <div class="about-hero-dimmer"></div>
    <div class="about-hero-content">
        <div class="about-breadcrumb reveal">
            <a href="{{ route('home') }}">Home</a>
            <span class="sep">/</span>
            <span>Tentang Kami</span>
        </div>
        <span class="hero-badge mb-2 reveal">✦ Tentang LaloeTrip</span>
        <h1 class="about-hero-title reveal">Cerita di Balik<br/><em>Setiap Perjalanan</em></h1>
        <p class="about-hero-sub reveal">Kami bukan sekadar penyedia trip — kami adalah teman perjalanan yang membawa Anda mengenal Lombok lebih dekat, lebih autentik, dan lebih berkesan.</p>
    </div>
    <div class="hero-wave">
        <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="var(--cream)"/>
        </svg>
    </div>
</section>

{{-- ═══════════════════════════════════════
     CERITA KAMI
════════════════════════════════════════ --}}
<section class="section-cerita">
    <div class="cerita-inner">

        {{-- KIRI: FOTO --}}
        <div class="cerita-img-wrap reveal">
            <img src="{{ asset('assets/about-story.jpg') }}" alt="Tim LaloeTrip" class="cerita-img">
            <div class="cerita-float-badge">
                <div class="cerita-float-num">2+</div>
                <div class="cerita-float-label">Tahun Melayani<br/>Traveler</div>
            </div>
        </div>

        {{-- KANAN: TEKS --}}
        <div class="cerita-text reveal">
            <span class="hero-badge mb-2" style="border-color:var(--gold); color:var(--gold);">Cerita Kami</span>
            <h2 class="itinerary-title">Berawal dari Cinta<br/>pada Lombok</h2>
            <p class="cerita-p">LaloeTrip lahir dari kecintaan sekelompok anak muda lokal terhadap keindahan Lombok yang belum banyak dijelajahi. "Laloe" sendiri berasal dari bahasa Sasak yang berarti "jalan-jalan" — mencerminkan semangat kami untuk mengajak setiap traveler merasakan pengalaman jalan-jalan yang santai, akrab, dan penuh makna.</p>
            <p class="cerita-p">Kami percaya bahwa healing trip terbaik tidak harus mahal. Dengan mengandalkan jaringan guide lokal dan pengetahuan mendalam tentang destinasi tersembunyi, kami menghadirkan paket wisata yang terjangkau namun tetap berkualitas — dari pantai berpasir pink hingga puncak Rinjani yang megah.</p>
            <a href="https://wa.me/6285713717336" target="_blank" class="itinerary-cta-btn">Ngobrol via WhatsApp</a>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════
     VISI & MISI
════════════════════════════════════════ --}}
<section class="section-visi-misi">
    <div class="section-header text-center mb-5 reveal">
        <span class="hero-badge mb-2" style="border-color:#1B8FD4; color:#1B8FD4;">Arah Kami</span>
        <h2 class="section-title">Visi &amp; Misi<br/>LaloeTrip</h2>
    </div>

    <div class="vm-grid">
        <div class="vm-card reveal zoom-in" style="--delay:0">
            <div class="vm-icon">🎯</div>
            <h3>Visi</h3>
            <p>Menjadi mitra perjalanan terpercaya yang memperkenalkan keindahan Nusa Tenggara Barat kepada dunia, sekaligus mengangkat kesejahteraan masyarakat lokal melalui pariwisata berkelanjutan.</p>
        </div>
        <div class="vm-card reveal zoom-in" style="--delay:1">
            <div class="vm-icon">🧭</div>
            <h3>Misi</h3>
            <ul class="vm-list">
                <li>Menyediakan paket wisata yang terjangkau, aman, dan berkualitas</li>
                <li>Memberdayakan guide dan mitra lokal di setiap destinasi</li>
                <li>Menjaga kelestarian alam dan budaya Lombok dalam setiap perjalanan</li>
                <li>Menghadirkan pengalaman personal lewat pelayanan yang ramah dan responsif</li>
            </ul>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════
     NILAI-NILAI KAMI
════════════════════════════════════════ --}}
<section class="section-nilai">
    <div class="section-header text-center mb-5 reveal">
        <span class="hero-badge mb-2" style="border-color:var(--gold); color:var(--gold);">Nilai Kami</span>
        <h2 class="section-title" style="color:#fff;">Yang Kami Pegang<br/><em>di Setiap Trip</em></h2>
    </div>

    <div class="nilai-grid">
        <div class="nilai-card reveal zoom-in" style="--delay:0">
            <div class="nilai-icon">🤝</div>
            <h3>Autentik</h3>
            <p>Pengalaman lokal yang jujur, bukan sekadar destinasi instagrammable semata.</p>
        </div>
        <div class="nilai-card reveal zoom-in" style="--delay:1">
            <div class="nilai-icon">🛡️</div>
            <h3>Terpercaya</h3>
            <p>Transparan soal harga, jadwal, dan itinerary — tanpa biaya tersembunyi.</p>
        </div>
        <div class="nilai-card reveal zoom-in" style="--delay:2">
            <div class="nilai-icon">🌱</div>
            <h3>Berkelanjutan</h3>
            <p>Menjaga alam Lombok tetap lestari untuk generasi traveler berikutnya.</p>
        </div>
        <div class="nilai-card reveal zoom-in" style="--delay:3">
            <div class="nilai-icon">💛</div>
            <h3>Ramah</h3>
            <p>Setiap traveler diperlakukan seperti teman, bukan sekadar pelanggan.</p>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════
     TIM KAMI
════════════════════════════════════════ --}}
<section class="section-tim">
    <div class="section-header text-center mb-5 reveal">
        <span class="hero-badge mb-2" style="border-color:#1B8FD4; color:#1B8FD4;">Tim Kami</span>
        <h2 class="section-title">Orang-Orang di Balik<br/>LaloeTrip</h2>
        <p class="section-sub">Tim kecil dengan semangat besar untuk membuat perjalanan Anda tak terlupakan.</p>
    </div>

    <div class="tim-grid">
        <div class="tim-card reveal zoom-in" style="--delay:0">
            <div class="tim-avatar">RA</div>
            <h3 class="tim-nama">Founder &amp; Trip Planner</h3>
            <p class="tim-role">Menyusun rute dan pengalaman terbaik untuk setiap traveler</p>
        </div>
        <div class="tim-card reveal zoom-in" style="--delay:1">
            <div class="tim-avatar">FG</div>
            <h3 class="tim-nama">Local Guide Coordinator</h3>
            <p class="tim-role">Menghubungkan traveler dengan guide lokal terbaik</p>
        </div>
        <div class="tim-card reveal zoom-in" style="--delay:2">
            <div class="tim-avatar">CS</div>
            <h3 class="tim-nama">Customer Support</h3>
            <p class="tim-role">Siap membantu 08.00–22.00 WITA setiap hari</p>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════
     CTA BANNER
════════════════════════════════════════ --}}
<section class="section-cta-about">
    <div class="cta-about-inner reveal">
        <h2 class="cta-about-title">Siap Menjelajahi<br/>Lombok Bersama Kami?</h2>
        <p class="cta-about-sub">Konsultasikan rencana trip Anda gratis via WhatsApp, kami bantu susunkan itinerary terbaik.</p>
        <div class="cta-about-btns">
            <a href="{{ route('paket.paket') }}" class="btn-primary" style="text-decoration:none;">Lihat Paket Trip</a>
            <a href="https://wa.me/6285713717336" target="_blank" class="btn-outline-dark ms-2" style="text-decoration:none;">Chat WhatsApp</a>
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

/* ═══ PAGE HERO ═══ */
.about-hero {
    position: relative;
    min-height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 8rem 5% 6rem;
    background:
        linear-gradient(135deg, rgba(10,22,40,.92) 0%, rgba(13,33,55,.92) 60%, rgba(20,40,64,.92) 100%),
        url('{{ asset('assets/gili.jpg') }}');
    background-size: cover;
    background-position: center;
    overflow: hidden;
}
.about-hero::before {
    content: '';
    position: absolute; top: -140px; right: -140px;
    width: 480px; height: 480px;
    background: radial-gradient(circle, rgba(245,166,35,.12) 0%, transparent 70%);
    pointer-events: none;
}
.about-hero-content { position: relative; z-index: 2; max-width: 700px; }
.about-breadcrumb {
    font-size: .8rem; color: rgba(255,255,255,.55);
    margin-bottom: 1.5rem; letter-spacing: .03em;
}
.about-breadcrumb a { color: rgba(255,255,255,.75); text-decoration: none; }
.about-breadcrumb a:hover { color: var(--gold); }
.about-breadcrumb .sep { margin: 0 .5rem; color: rgba(255,255,255,.35); }
.about-hero-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2.2rem, 5vw, 3.5rem);
    font-weight: 700; color: #fff; line-height: 1.15;
    margin: 1rem 0 1.2rem;
}
.about-hero-title em { font-style: normal; color: var(--gold); }
.about-hero-sub { color: rgba(255,255,255,.75); font-size: 1.05rem; line-height: 1.7; }
.hero-badge {
    display: inline-block; padding: 6px 18px;
    border: 1px solid var(--gold); color: var(--gold);
    border-radius: 50px; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 2px;
}
.hero-wave { position:absolute; bottom:-1px; width:100%; z-index:15; left:0; }

/* ═══ SECTION HELPERS ═══ */
.section-title { font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 700; color: var(--dark); line-height: 1.15; }
.section-title em { font-style: normal; color: var(--gold); }
.section-sub { color: #6a7d90; font-size: 1rem; max-width: 560px; margin: 0 auto; }
.itinerary-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem; font-weight: 700; color: var(--dark);
    line-height: 1.15; margin: .8rem 0 1.5rem;
}
.itinerary-cta-btn {
    display: inline-block; background: var(--gold); color: var(--dark);
    padding: .8rem 2rem; border-radius: 50px; font-weight: 700; font-size: .9rem;
    text-decoration: none; transition: all .3s; margin-top: .5rem;
}
.itinerary-cta-btn:hover { background: #d4890e; transform: translateY(-3px); color: var(--dark); }

/* ═══ CERITA KAMI ═══ */
.section-cerita { background: #fff; padding: 6rem 5%; }
.cerita-inner {
    display: grid; grid-template-columns: 1fr 1.1fr; gap: 4.5rem;
    align-items: center; max-width: 1150px; margin: 0 auto;
}
.cerita-img-wrap { position: relative; }
.cerita-img {
    width: 100%; height: 460px; object-fit: cover;
    border-radius: 24px; display: block;
    box-shadow: 0 20px 50px rgba(10,22,40,.15);
}
.cerita-float-badge {
    position: absolute; bottom: -1.5rem; left: -1.5rem;
    background: var(--dark); color: #fff;
    border-radius: 18px; padding: 1.2rem 1.5rem;
    box-shadow: 0 15px 35px rgba(10,22,40,.3);
    display: flex; align-items: center; gap: .9rem;
}
.cerita-float-num {
    font-family: 'Playfair Display', serif; font-size: 2.2rem;
    font-weight: 700; color: var(--gold); line-height: 1;
}
.cerita-float-label { font-size: .72rem; color: rgba(255,255,255,.7); line-height: 1.4; }
.cerita-p { color: #6a7d90; font-size: .95rem; line-height: 1.8; margin-bottom: 1.2rem; }

/* ═══ VISI MISI ═══ */
.section-visi-misi { background: var(--cream); padding: 6rem 5%; }
.vm-grid {
    display: grid; grid-template-columns: 1fr 1fr; gap: 1.8rem;
    max-width: 1000px; margin: 3rem auto 0;
}
.vm-card {
    background: #fff; border-radius: 20px; padding: 2.5rem;
    box-shadow: 0 4px 24px rgba(0,0,0,.05);
    transition: transform .35s ease, box-shadow .35s ease;
}
.vm-card:hover { transform: translateY(-6px); box-shadow: 0 16px 40px rgba(0,0,0,.1); }
.vm-icon { font-size: 2rem; margin-bottom: 1rem; }
.vm-card h3 {
    font-family: 'Playfair Display', serif; font-size: 1.4rem;
    font-weight: 700; color: var(--dark); margin-bottom: .8rem;
}
.vm-card p { color: #6a7d90; font-size: .9rem; line-height: 1.7; margin: 0; }
.vm-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: .7rem; }
.vm-list li {
    font-size: .88rem; color: #6a7d90; line-height: 1.6;
    padding-left: 1.4rem; position: relative;
}
.vm-list li::before {
    content: "✓"; color: #28a745; font-weight: 700;
    position: absolute; left: 0;
}

/* ═══ NILAI-NILAI ═══ */
.section-nilai {
    background: linear-gradient(135deg, var(--dark) 0%, #0D2137 60%, #142840 100%);
    padding: 6rem 5%; position: relative; overflow: hidden;
}
.section-nilai::before {
    content: ''; position: absolute; top: -100px; left: -100px;
    width: 480px; height: 480px;
    background: radial-gradient(circle, rgba(245,166,35,.08) 0%, transparent 70%);
    pointer-events: none;
}
.nilai-grid {
    display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem;
    max-width: 1150px; margin: 3rem auto 0; position: relative; z-index: 1;
}
.nilai-card {
    background: rgba(255,255,255,.05); border: 1px solid rgba(255,255,255,.08);
    border-radius: 18px; padding: 2.2rem 1.6rem; text-align: center;
    transition: transform .35s ease, border-color .35s ease, background .35s ease;
}
.nilai-card:hover { transform: translateY(-8px); border-color: rgba(245,166,35,.4); background: rgba(255,255,255,.08); }
.nilai-icon { font-size: 2rem; margin-bottom: .8rem; }
.nilai-card h3 {
    font-family: 'Playfair Display', serif; font-size: 1.1rem;
    font-weight: 700; color: #fff; margin-bottom: .5rem;
}
.nilai-card p { font-size: .85rem; color: rgba(255,255,255,.6); line-height: 1.6; margin: 0; }

/* ═══ TIM KAMI ═══ */
.section-tim { background: #fff; padding: 6rem 5%; }
.tim-grid {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.8rem;
    max-width: 1000px; margin: 3rem auto 0;
}
.tim-card {
    text-align: center; padding: 2.5rem 1.8rem;
    background: var(--cream); border-radius: 18px;
    transition: transform .35s ease, box-shadow .35s ease;
}
.tim-card:hover { transform: translateY(-8px); box-shadow: 0 16px 35px rgba(10,22,40,.1); }
.tim-avatar {
    width: 72px; height: 72px; border-radius: 50%;
    background: var(--dark); color: var(--gold);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700;
    margin: 0 auto 1.2rem;
}
.tim-nama { font-family: 'Playfair Display', serif; font-size: 1.1rem; font-weight: 700; color: var(--dark); margin-bottom: .5rem; }
.tim-role { font-size: .85rem; color: #6a7d90; line-height: 1.6; margin: 0; }

/* ═══ CTA BANNER ═══ */
.section-cta-about {
    background: var(--gold);
    padding: 5rem 5%; text-align: center;
}
.cta-about-inner { max-width: 650px; margin: 0 auto; }
.cta-about-title {
    font-family: 'Playfair Display', serif; font-size: clamp(1.8rem, 4vw, 2.6rem);
    font-weight: 700; color: var(--dark); line-height: 1.2; margin-bottom: 1rem;
}
.cta-about-sub { color: rgba(10,22,40,.75); font-size: 1rem; margin-bottom: 2rem; }
.cta-about-btns { display: inline-flex; gap: .8rem; flex-wrap: wrap; justify-content: center; }
.btn-primary {
    background: var(--dark); color: #fff;
    padding: 12px 30px; border-radius: 50px; font-weight: 600; display: inline-block;
    transition: transform .25s, box-shadow .25s;
}
.btn-primary:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(10,22,40,.3); color: #fff; }
.btn-outline-dark {
    border: 2px solid var(--dark); color: var(--dark);
    padding: 10px 30px; border-radius: 50px; font-weight: 600; display: inline-block;
    transition: transform .25s, box-shadow .25s;
}
.btn-outline-dark:hover { transform: translateY(-3px); background: var(--dark); color: #fff; }

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

/* ═══ RESPONSIVE ═══ */
@media (max-width: 768px) {
    .about-hero { min-height: 50vh; padding: 7rem 6% 5rem; }
    .section-title { font-size: 2rem; }
    .itinerary-title { font-size: 1.9rem; }
    .cerita-inner { grid-template-columns: 1fr; gap: 3rem; }
    .cerita-img { height: 320px; }
    .cerita-float-badge { left: 1rem; bottom: -1.2rem; padding: 1rem 1.2rem; }
    .vm-grid { grid-template-columns: 1fr; gap: 1.4rem; }
    .nilai-grid { grid-template-columns: 1fr 1fr; gap: 1rem; }
    .tim-grid { grid-template-columns: 1fr; gap: 1.4rem; }
    .cta-about-btns { flex-direction: column; align-items: center; }
    .cta-about-btns .btn-primary, .cta-about-btns .btn-outline-dark { width: 100%; max-width: 280px; text-align: center; }
    .ms-2 { margin-left: 0 !important; }
}
@media (max-width: 420px) {
    .nilai-grid { grid-template-columns: 1fr; }
}
@media (prefers-reduced-motion: reduce) {
    .reveal, .reveal.zoom-in { transition:none !important; animation:none !important; opacity:1; transform:none; }
}
</style>
@endpush

{{-- ═══════════════════════════════════════
     JS
════════════════════════════════════════ --}}
@push('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var reveals = document.querySelectorAll('.reveal');
    if (!reveals.length) return;

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
});
</script>
@endpush