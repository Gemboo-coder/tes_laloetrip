<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'LaloeTrip — Explore Lombok')</title>

    <link rel="icon" href="{{ asset('assets/logo.png') }}" type="image/png">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @stack('css')

    <style>
        :root {
            --blue:  #1B8FD4;
            --gold:  #F5A623;
            --dark:  #0A1628;
            --navy:  #0F2040;
            --cream: #FBF7F0;
            --white: #FFFFFF;
        }

        html { overflow-x: hidden; scroll-behavior: smooth; }
        *, *::before, *::after { box-sizing: border-box; }
        body {
            font-family: 'Outfit', sans-serif;
            background: var(--cream);
            color: var(--dark);
            margin: 0;
            overflow-x: hidden;
        }

        /* ════════════════════════════════════
        NAVBAR
        ════════════════════════════════════ */
        .navbar-custom {
            position: fixed;
            top: 0; left: 0; right: 0;
            width: 100%;
            z-index: 1000;
            background: transparent;
            transition: background .4s, box-shadow .4s;
        }
        .navbar-custom.scrolled {
            background: rgba(10,22,40,.97);
            backdrop-filter: blur(12px);
            box-shadow: 0 2px 30px rgba(0,0,0,.35);
        }

        .navbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 4%;
            width: 100%;
            transition: padding .4s;
        }
        .navbar-custom.scrolled .navbar-inner { padding: .7rem 4%; }

        /* Logo */
        .navbar-brand {
            margin: 0; padding: 0; line-height: 1; flex-shrink: 0;
        }
        .navbar-brand img { height: 32px; width: auto; display: block; }

        /* Desktop nav */
        .navbar-menu {
            display: flex;
            align-items: center;
            gap: .1rem;
            list-style: none;
            margin: 0; padding: 0;
        }
        .navbar-menu .nav-link {
            color: rgba(255,255,255,.9) !important;
            font-size: .85rem;
            font-weight: 500;
            padding: .4rem .7rem !important;
            white-space: nowrap;
            transition: color .25s;
        }
        .navbar-menu .nav-link:hover { color: var(--gold) !important; }

        .btn-booking {
            background: var(--gold);
            color: var(--dark) !important;
            padding: .45rem 1.2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: .85rem;
            border: none;
            text-decoration: none;
            white-space: nowrap;
            transition: background .3s, transform .2s;
            display: inline-block;
            margin-left: .5rem;
        }
        .btn-booking:hover { background: #e0961d; transform: scale(1.04); }

        /* Login desktop */
        .lang-switcher {
            display: flex;
            gap: 5px;
            margin-left: 12px;
            flex-shrink: 0;
        }
        .lang-btn {
            background: rgba(255,255,255,.1);
            color: #fff;
            border: 1px solid rgba(255,255,255,.3);
            padding: 3px 10px;
            font-size: .72rem;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            font-family: 'Outfit', sans-serif;
            transition: .3s;
        }
        .lang-btn.active { background: var(--gold); border-color: var(--gold); color: var(--dark); }
        .lang-btn:hover:not(.active) { background: rgba(255,255,255,.2); color: #fff; }

        /* Hamburger button */
        .hamburger {
            display: none;
            flex-direction: column;
            justify-content: center;
            gap: 5px;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,.1);
            border: 1.5px solid rgba(255,255,255,.4);
            border-radius: 8px;
            cursor: pointer;
            padding: 8px;
            flex-shrink: 0;
        }
        .hamburger span {
            display: block;
            height: 2px;
            background: #fff;
            border-radius: 2px;
            transition: transform .3s, opacity .3s;
        }

        /* Mobile fullscreen menu */
        .mobile-menu {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(10,22,40,.99);
            z-index: 1100;
            flex-direction: column;
            padding: 80px 6% 3rem;
            overflow-y: auto;
        }
        .mobile-menu.open { display: flex; }

        .mobile-menu-close {
            position: fixed;
            top: 1rem;
            right: 4%;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,.1);
            border: 1.5px solid rgba(255,255,255,.3);
            border-radius: 50%;
            color: #fff;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 1101;
        }

        .mobile-menu a.m-link {
            color: rgba(255,255,255,.85);
            font-size: 1.1rem;
            font-weight: 500;
            padding: .85rem 0;
            border-bottom: 1px solid rgba(255,255,255,.08);
            text-decoration: none;
            display: block;
            transition: color .2s;
        }
        .mobile-menu a.m-link:last-of-type { border-bottom: none; }
        .mobile-menu a.m-link:hover { color: var(--gold); }

        .mobile-menu .btn-booking {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            padding: .85rem;
            border-radius: 12px;
            font-size: .95rem;
            margin-left: 0;
        }
        .mobile-menu .m-login {
            color: var(--gold);
            font-weight: 600;
            font-size: 1rem;
            padding: .85rem 0;
            text-decoration: none;
            display: block;
            background: none;
            border: none;
            cursor: pointer;
            font-family: 'Outfit', sans-serif;
            text-align: left;
            width: 100%;
        }

        /* Responsive show/hide */
        @media (max-width: 991px) {
            .navbar-menu  { display: none; }
            .lang-switcher { display: none; }
            .hamburger    { display: flex; }
        }
        @media (min-width: 992px) {
            .hamburger     { display: none; }
            .mobile-menu   { display: none !important; }
        }

        /* ════════════════════════════════════
        FOOTER
        ════════════════════════════════════ */
        .custom-footer {
            background: var(--dark);
            color: rgba(255,255,255,.7);
            padding: 4rem 5% 2rem;
        }

        /* Desktop: 3 kolom */
        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand .logo-footer {
            height: 40px; width: auto;
            margin-bottom: 1.2rem;
            display: block;
        }
        .footer-brand p {
            font-size: .88rem;
            line-height: 1.7;
            max-width: 300px;
            margin: 0;
        }

        .footer-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            color: #fff;
            font-weight: 600;
            margin-bottom: 1.2rem;
        }
        .footer-links {
            list-style: none;
            padding: 0; margin: 0;
            display: flex;
            flex-direction: column;
            gap: .6rem;
        }
        .footer-links a {
            color: rgba(255,255,255,.6);
            text-decoration: none;
            font-size: .87rem;
            transition: color .3s;
        }
        .footer-links a:hover { color: var(--gold); }

        .social-links {
            display: flex;
            gap: .7rem;
            margin-top: 1.4rem;
            flex-wrap: wrap;
        }
        .social-link {
            width: 36px; height: 36px;
            background: rgba(255,255,255,.08);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: rgba(255,255,255,.7);
            font-size: .9rem;
            transition: all .3s;
        }
        .social-link:hover {
            background: var(--gold);
            color: var(--dark);
            transform: translateY(-3px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,.1);
            padding-top: 1.4rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: .82rem;
            flex-wrap: wrap;
            gap: .5rem;
        }

        /* Mobile footer */
        @media (max-width: 768px) {
            .custom-footer { padding: 2.5rem 5% 1.5rem; }

            /* Grid: brand full-width baris 1, menu+info 2 kolom baris 2 */
            .footer-grid {
                grid-template-columns: 1fr 1fr;
                grid-template-rows: auto auto;
                column-gap: 1.5rem;
                row-gap: 0;
            }
            .footer-brand {
                grid-column: 1 / -1;
                padding-bottom: 1.8rem;
                border-bottom: 1px solid rgba(255,255,255,.08);
                margin-bottom: 1.8rem;
            }
            .footer-brand p { max-width: 100%; }

            .footer-menu { grid-column: 1; }
            .footer-info { grid-column: 2; }

            .footer-title  { font-size: .95rem; margin-bottom: .85rem; }
            .footer-links  { gap: .5rem; }
            .footer-links a { font-size: .84rem; }

            .footer-bottom {
                grid-column: 1 / -1;
                flex-direction: column;
                align-items: flex-start;
                font-size: .8rem;
                margin-top: 1.8rem;
                gap: .3rem;
            }
        }

        /* ════════════════════════════════════
        GLOBAL REVEAL ANIMATION (dipakai semua page)
        ════════════════════════════════════ */
        .reveal {
            opacity: 0;
            transform: scale(0.85) translateY(24px);
            transition: opacity .7s cubic-bezier(.22,1,.36,1), transform .7s cubic-bezier(.22,1,.36,1);
            transition-delay: calc(var(--delay, 0) * 0.12s);
            will-change: opacity, transform;
        }
        .reveal.visible {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
        .reveal.zoom-in {
            transform: scale(0.7) translateY(20px);
            transition: opacity .8s cubic-bezier(.22,1,.36,1), transform .8s cubic-bezier(.22,1,.36,1);
            transition-delay: calc(var(--delay, 0) * 0.15s);
        }
        .reveal.zoom-in.visible {
            transform: scale(1) translateY(0);
        }
        @media (prefers-reduced-motion: reduce) {
            .reveal, .reveal.zoom-in {
                transition: none !important;
                opacity: 1;
                transform: none;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar-custom" id="mainNav">
    <div class="navbar-inner">

        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/logo.png') }}" alt="LaloeTrip">
        </a>

        <!-- Desktop menu -->
        <ul class="navbar-menu">
            <li><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
            <li><a class="nav-link" href="{{ route('paket.paket') }}">Paket Trip</a></li>
            <li><a class="nav-link" href="{{ route('destinasi.index') }}">Destinasi Wisata</a></li>
            <li><a class="nav-link" href="{{ route('about') }}">Tentang Kami</a></li>
            <li><a class="nav-link" href="#">Galeri</a></li>
            <li>
                <a href="https://wa.me/6285713717336" target="_blank" class="btn-booking">
                    Booking Sekarang
                </a>
            </li>
        </ul>

        <!-- Login desktop -->
        <div class="lang-switcher">
            @guest
                <a href="{{ route('login') }}" class="lang-btn active">Login</a>
            @else
                <form action="{{ route('logout') }}" method="POST" style="margin:0">
                    @csrf
                    <button type="submit" class="lang-btn active">Logout</button>
                </form>
            @endguest
        </div>

        <!-- Hamburger mobile -->
        <button class="hamburger" id="menuToggle" aria-label="Buka menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </div>
</nav>

<!-- Mobile fullscreen menu -->
<div class="mobile-menu" id="mobileMenu">
    <button class="mobile-menu-close" id="menuClose" aria-label="Tutup menu">✕</button>

    <a class="m-link" href="{{ route('home') }}">Beranda</a>
    <a class="m-link" href="{{ route('paket.paket') }}">Paket Trip</a>
    <a class="m-link" href="{{ route('destinasi.index') }}">Destinasi Wisata</a>
    <a class="m-link" href="{{ route('about') }}">Tentang Kami</a>
    <a class="m-link" href="#">Galeri</a>

    <a href="https://wa.me/6285713717336" target="_blank" class="btn-booking">
        Booking Sekarang
    </a>

    @guest
        <a href="{{ route('login') }}" class="m-login">Login</a>
    @else
        <form action="{{ route('logout') }}" method="POST" style="margin:0">
            @csrf
            <button type="submit" class="m-login">Logout</button>
        </form>
    @endguest
</div>

<!-- CONTENT -->
<main>
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="custom-footer">
    <div class="footer-grid">

        <!-- Brand -->
        <div class="footer-brand">
            <img src="{{ asset('assets/logo.png') }}" alt="LaloeTrip" class="logo-footer">
            <p>
                Affordable healing trip dengan pengalaman lokal yang autentik.
                Jelajahi keindahan Lombok bersama LaloeTrip — momen terbaik untuk jiwa dan konten Anda.
            </p>
            <div class="social-links">
                <a href="#" class="social-link" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                <a href="#" class="social-link" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-link" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>

        <!-- Menu -->
        <div class="footer-menu">
            <h4 class="footer-title">Menu</h4>
            <ul class="footer-links">
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="{{ route('paket.paket') }}">Paket Trip</a></li>
                <li><a href="#">Jenis Trip</a></li>
                <li><a href="#">Galeri</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </div>

        <!-- Informasi -->
        <div class="footer-info">
            <h4 class="footer-title">Informasi</h4>
            <ul class="footer-links">
                <li><a href="#">Syarat &amp; Ketentuan</a></li>
                <li><a href="#">Kebijakan Privasi</a></li>
                <li><a href="#">Kebijakan Refund</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Cara Booking</a></li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        <div>© 2026 LaloeTrip. Semua hak dilindungi.</div>
        <div>Made with <span style="color:#e74c3c;">❤️</span> in Lombok</div>
    </div>
</footer>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // Navbar scroll
    var nav = document.getElementById('mainNav');
    window.addEventListener('scroll', function () {
        nav.classList.toggle('scrolled', window.scrollY > 50);
    });

    // Mobile menu
    var toggle   = document.getElementById('menuToggle');
    var menu     = document.getElementById('mobileMenu');
    var closeBtn = document.getElementById('menuClose');

    function openMenu()  { menu.classList.add('open');    document.body.style.overflow = 'hidden'; }
    function closeMenu() { menu.classList.remove('open'); document.body.style.overflow = ''; }

    if (toggle)   toggle.addEventListener('click', openMenu);
    if (closeBtn) closeBtn.addEventListener('click', closeMenu);

    if (menu) {
        // Tutup saat link diklik
        menu.querySelectorAll('a.m-link').forEach(function(a) {
            a.addEventListener('click', closeMenu);
        });
    }

    // ── REVEAL ON SCROLL — global, dipakai semua page ──
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
        reveals.forEach(function (el) { revealObserver.observe(el); });

        // Safety net: elemen reveal yang udah kelihatan di viewport
        // saat halaman pertama kali load, munculin langsung.
        reveals.forEach(function (el) {
            var rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                el.classList.add('visible');
                revealObserver.unobserve(el);
            }
        });
    }

});
</script>

@stack('js')

</body>
</html>