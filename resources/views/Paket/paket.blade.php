    @extends('layouts.layout')

    @section('title', 'Paket Trip — LaloeTrip | Explore Lombok')

    @section('content')

    {{-- HERO SECTION --}}
    <section class="paket-hero">
        <div class="paket-hero-bg" style="background-image: url('{{ asset('assets/gili.jpg') }}');"></div>
        <div class="paket-hero-dimmer"></div>
        <div class="paket-hero-content">
            <span class="hero-badge">✦ Paket Wisata</span>
            <h1 class="hero-title mt-3">Pilih Perjalanan<br><em>Impian Anda</em></h1>
            <p class="hero-sub">Dari fullday trip santai hingga petualangan multi-hari yang mendebarkan — semua tersedia dengan harga yang terjangkau dan pengalaman yang tak terlupakan.</p>
        </div>
        <div class="paket-hero-wave">
            <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="var(--cream)"/>
            </svg>
        </div>
    </section>

    {{-- FILTER & SORT BAR --}}
    <section style="background: var(--cream); padding: 2.5rem 5% 0;">
        <div class="filter-bar">
            <div class="filter-tabs">
                <button class="filter-tab active" data-filter="all">Semua Paket</button>
                @foreach($paketTrips->pluck('jenis_paket')->unique()->filter() as $jenis)
                    <button class="filter-tab" data-filter="{{ Str::slug($jenis) }}">
                        {{ $jenis }}
                    </button>
                @endforeach
            </div>
            <div class="filter-sort">
                <select class="sort-select" id="sortSelect">
                    <option value="default">Paling Populer</option>
                    <option value="harga_asc">Harga Terendah</option>
                    <option value="harga_desc">Harga Tertinggi</option>
                </select>
            </div>
        </div>
    </section>

    {{-- PAKET GRID --}}
    <section style="background: var(--cream); padding: 3rem 5% 6rem;">

        @if($paketTrips->isEmpty())
            <div class="empty-state">
                <div class="empty-icon">🏝️</div>
                <h3>Paket belum tersedia</h3>
                <p>Kami sedang menyiapkan paket wisata terbaik untuk kamu.</p>
                <a href="https://wa.me/6285713717336" target="_blank" class="paket-book-btn" style="display:inline-block; margin-top:1rem;">
                    Tanya via WhatsApp
                </a>
            </div>
        @else
            <div class="paket-grid" id="paketGrid">
                @foreach($paketTrips as $paket)
                    @php $isFeatured = $loop->first; @endphp

                    <article class="paket-card {{ $isFeatured ? 'paket-card--featured' : '' }}"
                            data-category="{{ Str::slug($paket->jenis_paket) }}"
                            data-harga="{{ $paket->harga }}">

                        {{-- IMAGE --}}
                        <div class="paket-card-img-wrap">
                            @if($paket->thumbnail)
                                <img src="{{ asset('storage/' . $paket->thumbnail) }}"
                                    alt="{{ $paket->nama_paket }}"
                                    class="paket-card-img">
                            @else
                                <div class="paket-card-img--placeholder">
                                    <span>🏖️</span>
                                </div>
                            @endif

                            <span class="paket-tag">{{ $paket->jenis_paket }}</span>

                            @if($isFeatured)
                                <div class="paket-popular-badge">⭐ TERPOPULER</div>
                            @endif

                            <div class="paket-card-overlay">
                                <a href="{{ route('paket.show', $paket->slug) }}" class="paket-overlay-btn">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>

                        {{-- BODY --}}
                        <div class="paket-card-body">
                            <div class="paket-meta">
                                <span class="paket-duration">⏱ {{ $paket->durasi }}</span>
                            </div>

                            <h3 class="paket-title">{{ $paket->nama_paket }}</h3>

                            <p class="paket-desc">{{ Str::limit($paket->deskripsi, 120) }}</p>

                            <div class="paket-card-footer">
                                <div class="paket-price-wrap">
                                    <span class="paket-price-label">Mulai dari</span>
                                    <span class="paket-price">Rp {{ number_format($paket->harga, 0, ',', '.') }}</span>
                                    <span class="paket-price-unit">/pax</span>
                                </div>
                                <a href="{{ route('paket.show', $paket->slug) }}"
                                class="paket-book-btn {{ $isFeatured ? 'paket-book-btn--gold' : '' }}">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>

                    </article>
                @endforeach
            </div>
        @endif

        {{-- INFO PEMBAYARAN --}}
        <div class="payment-info" style="margin-top: 2.5rem;">
            <div class="payment-info-icon">💡</div>
            <div>
                <strong>Sistem Pembayaran DP</strong>
                <p>Bayar sebagian untuk konfirmasi booking. Pelunasan sebelum keberangkatan. DP tidak dapat dikembalikan jika pembatalan dilakukan oleh peserta. Harga dikondisikan berdasarkan jumlah peserta.</p>
            </div>
        </div>

    </section>

    {{-- CTA SECTION --}}
    <section class="paket-cta-section">
        <div class="paket-cta-inner">
            <span class="hero-badge mb-3" style="border-color: var(--gold); color: var(--gold);">✦ Masih Bingung?</span>
            <h2 class="hero-title" style="font-size: 2.5rem;">Konsultasi Gratis<br><em>Bersama Tim Kami</em></h2>
            <p class="hero-sub" style="color: rgba(255,255,255,.75); max-width: 500px; margin: 1rem auto 2rem;">
                Ceritakan tujuan dan budget kamu — kami bantu susun itinerary terbaik yang sesuai dengan kebutuhan kamu.
            </p>
            <a href="https://wa.me/6285713717336" target="_blank" class="cta-wa-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" style="margin-right: 8px;">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                    <path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.122 1.532 5.854L.057 23.886l6.183-1.453A11.945 11.945 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.9 0-3.681-.497-5.228-1.367l-.375-.222-3.67.862.878-3.584-.244-.389A9.951 9.951 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/>
                </svg>
                Chat WhatsApp Sekarang
            </a>
        </div>
    </section>

    @endsection

    @push('css')
    <style>
    /* ── HERO ── */
    .paket-hero {
        position: relative;
        height: 60vh;
        min-height: 420px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        overflow: hidden;
    }
    .paket-hero-bg {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center 30%;
        transform: scale(1.05);
    }
    .paket-hero-dimmer {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(10,22,40,.75), rgba(10,22,40,.5));
        z-index: 1;
    }
    .paket-hero-content {
        position: relative;
        z-index: 10;
        padding: 0 20px;
    }
    .paket-hero-wave {
        position: absolute;
        bottom: -1px;
        width: 100%;
        z-index: 15;
    }

    /* ── FILTER BAR ── */
    .filter-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        flex-wrap: wrap;
        padding: 1.2rem 1.8rem;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,.06);
    }
    .filter-tabs {
        display: flex;
        gap: .5rem;
        flex-wrap: wrap;
    }
    .filter-tab {
        background: transparent;
        border: 1.5px solid rgba(10,22,40,.15);
        color: #4e6070;
        padding: .45rem 1.1rem;
        border-radius: 50px;
        font-size: .82rem;
        font-weight: 500;
        cursor: pointer;
        transition: all .25s;
        font-family: 'Outfit', sans-serif;
    }
    .filter-tab:hover,
    .filter-tab.active {
        background: var(--dark);
        border-color: var(--dark);
        color: #fff;
    }
    .sort-select {
        border: 1.5px solid rgba(10,22,40,.15);
        border-radius: 50px;
        padding: .45rem 1.2rem;
        font-size: .82rem;
        font-family: 'Outfit', sans-serif;
        color: var(--dark);
        background: #fff;
        cursor: pointer;
        outline: none;
    }

    /* ── GRID ── */
    .paket-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.8rem;
        margin-top: 2rem;
    }

    /* ── CARD ── */
    .paket-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 24px rgba(0,0,0,.06);
        transition: transform .35s ease, box-shadow .35s ease;
        display: flex;
        flex-direction: column;
    }
    .paket-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0,0,0,.12);
    }
    .paket-card--featured {
        border: 2px solid var(--gold);
    }

    /* Image wrap */
    .paket-card-img-wrap {
        position: relative;
        overflow: hidden;
        height: 220px;
        background: linear-gradient(135deg, var(--dark), #0D2137);
    }
    .paket-card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s ease;
        display: block;
    }
    .paket-card:hover .paket-card-img {
        transform: scale(1.06);
    }
    .paket-card-img--placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3.5rem;
    }

    /* Overlay */
    .paket-card-overlay {
        position: absolute;
        inset: 0;
        background: rgba(10,22,40,.6);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity .3s ease;
        z-index: 10;
    }
    .paket-card:hover .paket-card-overlay {
        opacity: 1;
    }
    .paket-overlay-btn {
        background: var(--gold);
        color: var(--dark);
        padding: .6rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: .85rem;
        text-decoration: none;
    }

    /* Tag & Badge */
    .paket-tag {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: rgba(10,22,40,.85);
        color: #fff;
        font-size: .72rem;
        font-weight: 600;
        letter-spacing: .08em;
        padding: .3rem .9rem;
        border-radius: 50px;
        z-index: 5;
    }
    .paket-popular-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: var(--gold);
        color: var(--dark);
        font-size: .7rem;
        font-weight: 700;
        padding: .3rem .9rem;
        border-radius: 50px;
        z-index: 5;
    }

    /* Card body */
    .paket-card-body {
        padding: 1.5rem 1.8rem;
        display: flex;
        flex-direction: column;
        flex: 1;
    }
    .paket-meta {
        margin-bottom: .8rem;
    }
    .paket-duration {
        font-size: .78rem;
        color: #9aacbc;
        font-weight: 500;
    }
    .paket-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: .5rem;
        line-height: 1.3;
    }
    .paket-desc {
        font-size: .85rem;
        color: #6a7d90;
        line-height: 1.6;
        margin-bottom: 1rem;
        flex: 1;
    }

    /* Card footer */
    .paket-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 1.2rem;
        border-top: 1px solid rgba(0,0,0,.06);
        margin-top: auto;
    }
    .paket-price-wrap {
        display: flex;
        flex-direction: column;
    }
    .paket-price-label {
        font-size: .72rem;
        color: #9aacbc;
        margin-bottom: .1rem;
    }
    .paket-price {
        font-family: 'Playfair Display', serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--dark);
    }
    .paket-price-unit {
        font-size: .75rem;
        color: #9aacbc;
    }
    .paket-book-btn {
        background: var(--dark);
        color: #fff;
        padding: .55rem 1.4rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: .82rem;
        text-decoration: none;
        transition: background .25s, transform .2s;
        white-space: nowrap;
    }
    .paket-book-btn:hover {
        background: #1B8FD4;
        color: #fff;
    }
    .paket-book-btn--gold {
        background: var(--gold);
        color: var(--dark);
    }
    .paket-book-btn--gold:hover {
        background: #d4890e;
        color: var(--dark);
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 5rem 2rem;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 4px 24px rgba(0,0,0,.06);
        margin-top: 2rem;
    }
    .empty-state .empty-icon { font-size: 4rem; margin-bottom: 1rem; }
    .empty-state h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        color: var(--dark);
        margin-bottom: .5rem;
    }
    .empty-state p { color: #6a7d90; font-size: .9rem; }

    /* Payment info */
    .payment-info {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1.5rem 2rem;
        background: rgba(27,143,212,.08);
        border-radius: 14px;
        border-left: 4px solid #1B8FD4;
    }
    .payment-info-icon { font-size: 1.5rem; flex-shrink: 0; }
    .payment-info strong { display: block; color: var(--dark); font-size: .95rem; margin-bottom: .3rem; }
    .payment-info p { font-size: .85rem; color: #4e6070; margin: 0; line-height: 1.6; }

    /* CTA */
    .paket-cta-section {
        background: linear-gradient(135deg, var(--dark) 0%, #0D2137 60%, #142840 100%);
        padding: 6rem 5%;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .paket-cta-section::before {
        content: '';
        position: absolute;
        top: -80px; right: -80px;
        width: 400px; height: 400px;
        background: radial-gradient(circle, rgba(245,166,35,.12) 0%, transparent 70%);
        pointer-events: none;
    }
    .paket-cta-inner { position: relative; z-index: 1; }
    .cta-wa-btn {
        display: inline-flex;
        align-items: center;
        background: #25D366;
        color: #fff;
        padding: .9rem 2.2rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: .95rem;
        text-decoration: none;
        transition: all .3s;
        box-shadow: 0 8px 30px rgba(37,211,102,.3);
    }
    .cta-wa-btn:hover {
        background: #1aaa53;
        transform: translateY(-3px);
        color: #fff;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .paket-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 640px) {
        .paket-grid { grid-template-columns: 1fr; }
        .filter-bar { flex-direction: column; align-items: flex-start; }
        .paket-hero { height: 50vh; }
    }
    </style>
    @endpush

    @push('js')
    <script>
    // Filter tabs
    const tabs = document.querySelectorAll('.filter-tab');
    const grid = document.getElementById('paketGrid');

    function getCards() {
        return grid ? Array.from(grid.querySelectorAll('.paket-card')) : [];
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            const filter = tab.dataset.filter;
            getCards().forEach(card => {
                card.style.display = (filter === 'all' || card.dataset.category === filter) ? 'flex' : 'none';
            });
        });
    });

    // Sort
    const sortSelect = document.getElementById('sortSelect');
    if (sortSelect) {
        sortSelect.addEventListener('change', function () {
            if (!grid) return;
            const cards = getCards();
            cards.sort((a, b) => {
                const ha = parseInt(a.dataset.harga) || 0;
                const hb = parseInt(b.dataset.harga) || 0;
                if (this.value === 'harga_asc') return ha - hb;
                if (this.value === 'harga_desc') return hb - ha;
                return 0;
            });
            cards.forEach(card => grid.appendChild(card));
        });
    }
    </script>
    @endpush