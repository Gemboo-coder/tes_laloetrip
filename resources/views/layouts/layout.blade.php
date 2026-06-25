<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'LaloeTrip — Explore Lombok')</title>

    <link rel="icon" href="{{ asset('assets/gambar/logo.png') }}" type="image/png">
    
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    @stack('css') 


    <style>
        :root {
            --blue: #1B8FD4;
            --gold: #F5A623;
            --dark: #0A1628;
            --navy: #0F2040;
            --cream: #FBF7F0;
            --white: #FFFFFF;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--cream);
            color: var(--dark);
        }

        /* ── CUSTOM NAVBAR DESIGN ── */
       /* ── CUSTOM NAVBAR DESIGN ── */
.navbar-custom {
    background: transparent; /* Transparan di awal sesuai gambar */
    padding: 1.2rem 5%;
    transition: all 0.4s ease;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
}

.navbar-custom.scrolled {
    background: rgba(10, 22, 40, 0.95);
    backdrop-filter: blur(12px);
    padding: 0.8rem 5%;
    box-shadow: 0 2px 30px rgba(0,0,0,.3);
}

.navbar-brand img {
    height: 35px; /* Ukuran lebih proporsional sesuai gambar */
    transition: transform 0.3s;
}

/* Menu Tengah */
.nav-link {
    color: rgba(255, 255, 255, 0.9) !important;
    font-size: 0.85rem;
    font-weight: 500;
    margin: 0 12px;
    transition: color 0.3s;
    text-transform: capitalize;
}

.nav-link:hover {
    color: var(--gold) !important;
}

/* CTA BUTTON (Pill Shaped) */
.btn-booking {
    background: var(--gold);
    color: var(--dark) !important;
    padding: 0.5rem 1.4rem;
    border-radius: 50px; /* Membuat bentuk pill sesuai gambar */
    font-weight: 600;
    font-size: 0.85rem;
    border: none;
    transition: all 0.3s ease;
    margin-left: 10px;
}

.btn-booking:hover {
    background: #e0961d;
    transform: scale(1.05);
}

/* Language Switcher (Kanan) */
.lang-switcher {
    display: flex;
    gap: 5px;
    margin-left: 20px;
}

.lang-btn {
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    border: 1px solid rgba(255, 255, 255, 0.3);
    padding: 2px 8px;
    font-size: 0.7rem;
    border-radius: 4px;
    text-decoration: none;
    transition: 0.3s;
}

.lang-btn.active {
    background: var(--gold);
    border-color: var(--gold);
    color: var(--dark);
}

.lang-btn:hover:not(.active) {
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
}

        /* ── FOOTER STYLE ── */
.custom-footer {
    background: var(--dark);
    color: rgba(255, 255, 255, .7);
    padding: 4rem 5% 2rem;
}

.footer-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr; /* Kolom kiri lebih lebar */
    gap: 3rem;
    margin-bottom: 3rem;
}

/* Responsif untuk HP */
@media (max-width: 768px) {
    .footer-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
}

.footer-brand .logo-footer {
    height: 48px;
    margin-bottom: 1.5rem;
    object-fit: contain;
}

.footer-brand p {
    font-size: .88rem;
    line-height: 1.7;
    max-width: 320px;
}

.footer-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.1rem;
    color: #fff;
    font-weight: 600;
    margin-bottom: 1.5rem;
}

.footer-links {
    list-style: none;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: .7rem;
}

.footer-links a {
    color: rgba(255, 255, 255, .6);
    text-decoration: none;
    font-size: .88rem;
    transition: color .3s;
}

.footer-links a:hover {
    color: var(--gold);
}

.social-links {
    display: flex;
    gap: .8rem;
    margin-top: 1.5rem;
}

.social-link {
    width: 36px;
    height: 36px;
    background: rgba(255, 255, 255, .08);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: rgba(255, 255, 255, .7);
    transition: all .3s;
}

.social-link:hover {
    background: var(--gold);
    color: var(--dark);
    transform: translateY(-3px);
}

.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, .1);
    padding-top: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: .82rem;
}
.hero {
    position: relative;
    height: 100vh;
    width: 100%;
    overflow: hidden;
    background-color: #000; /* Dasar hitam biar makin redup */
}

/* Carousel Background */

</style>
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">

        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/logo.png') }}" alt="LaloeTrip">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav align-items-center">

            <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('paket.paket') }}">Paket Trip</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang Kami</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#">Galeri</a>
                </li>
          
             
                <li class="nav-item">
                    <a href="https://wa.me/6285713717336" target="_blank" class="btn btn-booking">
                        Booking Sekarang
                    </a>
                </li>
            </ul>
        </div>

<div class="lang-switcher d-none d-lg-flex">
    @guest
        <a href="{{ route('login') }}" class="lang-btn active">Login</a>
    @else
        <form action="{{ route('logout') }}" method="POST" style="margin:0">
            @csrf
            <button type="submit" class="lang-btn active">Logout</button>
        </form>
    @endguest
</div>

    </div>
</nav>

<!-- CONTENT -->
<main>
    @yield('content')
</main>

<!-- FOOTER (Sederhana namun matching) -->
<footer class="custom-footer">
    <div class="footer-grid">
        <div class="footer-brand">
            <img src="{{ asset('assets/logo.png') }}" alt="LaloeTrip" class="logo-footer">
            <p>
                Affordable healing trip dengan pengalaman lokal yang autentik. 
                Jelajahi keindahan Lombok bersama LaloeTrip — momen terbaik untuk jiwa dan konten Anda.
            </p>
            <div class="social-links">
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fab fa-tiktok"></i></a>
                <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                <a href="#" class="social-link"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>

        <div class="footer-menu">
            <h4 class="footer-title">Menu</h4>
            <ul class="footer-links">
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Paket Trip</a></li>
                <li><a href="#">Jenis Trip</a></li>
                <li><a href="#">Galeri</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </div>

        <div class="footer-info">
            <h4 class="footer-title">Informasi</h4>
            <ul class="footer-links">
                <li><a href="#">Syarat & Ketentuan</a></li>
                <li><a href="#">Kebijakan Privasi</a></li>
                <li><a href="#">Kebijakan Refund</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Cara Booking</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="copyright">
            © 2026 LaloeTrip. Semua hak dilindungi.
        </div>
        <div class="made-by">
            Made with <span style="color: #e74c3c;">❤️</span> in Lombok
        </div>
    </div>
</footer>   

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script Navbar Transparan ke Gelap saat Scroll -->
<script>
    window.addEventListener('scroll', function() {
        const nav = document.querySelector('.navbar-custom');
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });
</script>

</body>
</html>