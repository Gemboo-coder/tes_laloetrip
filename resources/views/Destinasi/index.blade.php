@extends('layouts.layout')

@section('title', 'Destinasi Wisata — LaloeTrip | Explore Lombok')

@section('content')

{{-- ═══════════════════════════════════════
     HERO
════════════════════════════════════════ --}}
<section class="destinasi-hero">
    <div class="destinasi-hero-bg" style="background-image: url('{{ asset('assets/gili.jpg') }}');"></div>
    <div class="destinasi-hero-dimmer"></div>
    <div class="destinasi-hero-content">
        <span class="hero-badge">✦ Jelajahi Lombok</span>
        <h1 class="hero-title mt-3">Temukan Destinasi<br><em>Impian Kamu</em></h1>
        <p class="hero-sub">50+ destinasi eksotis dan instagrammable di Lombok — dari pantai tersembunyi hingga puncak gunung berapi yang memukau.</p>
    </div>
    <div class="destinasi-hero-wave">
        <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="var(--cream)"/>
        </svg>
    </div>
</section>

{{-- ═══════════════════════════════════════
     FILTER BAR
════════════════════════════════════════ --}}
<section style="background:var(--cream); padding:2.5rem 5% 0;">
    <div class="filter-bar">
        <div class="filter-tabs">
            <button class="filter-tab active" data-filter="all">Semua</button>
            @foreach($destinasis->pluck('kategori')->unique()->filter() as $kat)
                <button class="filter-tab" data-filter="{{ Str::slug($kat) }}">
                    {{ $kat }}
                </button>
            @endforeach
        </div>
        <div class="filter-sort">
            <select class="sort-select" id="sortSelect">
                <option value="default">Terbaru</option>
                <option value="az">A → Z</option>
                <option value="za">Z → A</option>
            </select>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════
     DESTINASI GRID
════════════════════════════════════════ --}}
<section style="background:var(--cream); padding:3rem 5% 6rem;">

    @if($destinasis->isEmpty())
        <div class="empty-state">
            <div class="empty-icon">🏝️</div>
            <h3>Destinasi belum tersedia</h3>
            <p>Kami sedang menyiapkan destinasi terbaik untuk kamu.</p>
        </div>
    @else
        <div class="destinasi-grid" id="destinasiGrid">
            @foreach($destinasis as $destinasi)
            <article class="dest-card"
                     data-category="{{ Str::slug($destinasi->kategori) }}"
                     data-nama="{{ $destinasi->nama_destinasi }}">

                {{-- Image --}}
                <div class="dest-card-img-wrap">
                    @if($destinasi->gambar)
                        <img src="{{ asset('storage/' . $destinasi->gambar) }}"
                             alt="{{ $destinasi->nama_destinasi }}"
                             class="dest-card-img">
                    @else
                        <div class="dest-card-placeholder">🏝️</div>
                    @endif

                    <span class="dest-kategori">{{ $destinasi->kategori }}</span>

                    <div class="dest-card-overlay">
                        <a href="{{ route('destinasi.show', $destinasi->slug) }}" class="dest-overlay-btn">
                            Lihat Detail
                        </a>
                    </div>
                </div>

                {{-- Body --}}
                <div class="dest-card-body">
                    <h3 class="dest-nama">{{ $destinasi->nama_destinasi }}</h3>
                    <p class="dest-desc">{{ Str::limit($destinasi->deskripsi, 90) }}</p>
                    <div class="dest-card-footer">
                        <a href="{{ route('destinasi.show', $destinasi->slug) }}" class="dest-btn">
                            Explore →
                        </a>
                    </div>
                </div>

            </article>
            @endforeach
        </div>
    @endif

</section>

{{-- ═══════════════════════════════════════
     CTA SECTION
════════════════════════════════════════ --}}
<section class="dest-cta-section">
    <div class="dest-cta-inner">
        <span class="hero-badge mb-3" style="border-color:var(--gold); color:var(--gold);">✦ Siap Berangkat?</span>
        <h2 class="hero-title" style="font-size:2.5rem;">Booking Trip<br><em>Sekarang Juga</em></h2>
        <p class="hero-sub" style="color:rgba(255,255,255,.75); max-width:500px; margin:1rem auto 2rem;">
            Temukan destinasi favorit kamu, lalu hubungi kami untuk paket trip terbaik yang sesuai budget.
        </p>
        <a href="{{ route('paket.paket') }}" class="dest-cta-btn-paket">
            Lihat Paket Trip
        </a>
        <a href="https://wa.me/6285713717336" target="_blank" class="dest-cta-btn-wa">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="margin-right:6px;">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                <path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.122 1.532 5.854L.057 23.886l6.183-1.453A11.945 11.945 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.9 0-3.681-.497-5.228-1.367l-.375-.222-3.67.862.878-3.584-.244-.389A9.951 9.951 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/>
            </svg>
            Chat WhatsApp
        </a>
    </div>
</section>

@endsection

@push('css')
<style>
/* ── HERO ── */
.destinasi-hero {
    position: relative;
    height: 60vh;
    min-height: 420px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    overflow: hidden;
}
.destinasi-hero-bg {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center 30%;
    transform: scale(1.05);
}
.destinasi-hero-dimmer {
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, rgba(10,22,40,.75), rgba(10,22,40,.5));
    z-index: 1;
}
.destinasi-hero-content { position:relative; z-index:10; padding:0 20px; }
.destinasi-hero-wave { position:absolute; bottom:-1px; width:100%; z-index:15; }

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
.filter-tabs { display:flex; gap:.5rem; flex-wrap:wrap; }
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
.filter-tab:hover, .filter-tab.active {
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

/* ── DESTINASI GRID ── */
.destinasi-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.8rem;
    margin-top: 2rem;
}

/* ── DEST CARD ── */
.dest-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(0,0,0,.06);
    transition: transform .35s ease, box-shadow .35s ease;
    display: flex;
    flex-direction: column;
}
.dest-card:hover { transform:translateY(-8px); box-shadow:0 20px 50px rgba(0,0,0,.12); }

/* Image */
.dest-card-img-wrap {
    position: relative;
    overflow: hidden;
    height: 220px;
    background: linear-gradient(135deg, var(--dark), #0D2137);
}
.dest-card-img {
    width: 100%; height: 100%;
    object-fit: cover; display: block;
    transition: transform .5s ease;
}
.dest-card:hover .dest-card-img { transform: scale(1.06); }
.dest-card-placeholder {
    width: 100%; height: 100%;
    display: flex; align-items: center; justify-content: center;
    font-size: 3.5rem;
}
.dest-card-overlay {
    position: absolute; inset: 0;
    background: rgba(10,22,40,.6);
    display: flex; align-items: center; justify-content: center;
    opacity: 0; transition: opacity .3s ease;
}
.dest-card:hover .dest-card-overlay { opacity: 1; }
.dest-overlay-btn {
    background: var(--gold); color: var(--dark);
    padding: .6rem 1.5rem; border-radius: 50px;
    font-weight: 600; font-size: .85rem; text-decoration: none;
}
.dest-kategori {
    position: absolute; top: 1rem; left: 1rem;
    background: rgba(10,22,40,.85); color: #fff;
    font-size: .72rem; font-weight: 600; letter-spacing: .08em;
    padding: .3rem .9rem; border-radius: 50px; z-index: 5;
}

/* Body */
.dest-card-body { padding:1.5rem 1.8rem; display:flex; flex-direction:column; flex:1; }
.dest-nama {
    font-family: 'Playfair Display', serif;
    font-size: 1.2rem; font-weight: 700; color: var(--dark);
    margin-bottom: .5rem;
}
.dest-desc { font-size:.85rem; color:#6a7d90; line-height:1.6; flex:1; margin-bottom:1rem; }
.dest-card-footer { margin-top: auto; }
.dest-btn {
    display: inline-block;
    background: var(--dark); color: #fff;
    padding: .55rem 1.4rem; border-radius: 50px;
    font-weight: 600; font-size: .82rem; text-decoration: none;
    transition: background .25s;
}
.dest-btn:hover { background: #1B8FD4; color: #fff; }

/* Empty state */
.empty-state {
    text-align: center; padding: 5rem 2rem;
    background: #fff; border-radius: 20px;
    box-shadow: 0 4px 24px rgba(0,0,0,.06);
    margin-top: 2rem;
}
.empty-state .empty-icon { font-size:4rem; margin-bottom:1rem; }
.empty-state h3 { font-family:'Playfair Display',serif; font-size:1.5rem; color:var(--dark); margin-bottom:.5rem; }
.empty-state p { color:#6a7d90; font-size:.9rem; }

/* ── CTA ── */
.dest-cta-section {
    background: linear-gradient(135deg, var(--dark) 0%, #0D2137 60%, #142840 100%);
    padding: 6rem 5%;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.dest-cta-section::before {
    content: ''; position: absolute;
    top: -80px; right: -80px;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(245,166,35,.12) 0%, transparent 70%);
    pointer-events: none;
}
.dest-cta-inner { position:relative; z-index:1; }
.dest-cta-btn-paket {
    display: inline-flex; align-items: center;
    background: var(--gold); color: var(--dark);
    padding: .9rem 2.2rem; border-radius: 50px;
    font-weight: 700; font-size: .95rem; text-decoration: none;
    transition: all .3s; margin-right: .8rem;
}
.dest-cta-btn-paket:hover { background: #d4890e; color: var(--dark); transform: translateY(-3px); }
.dest-cta-btn-wa {
    display: inline-flex; align-items: center;
    background: #25D366; color: #fff;
    padding: .9rem 2.2rem; border-radius: 50px;
    font-weight: 700; font-size: .95rem; text-decoration: none;
    transition: all .3s; box-shadow: 0 8px 30px rgba(37,211,102,.3);
}
.dest-cta-btn-wa:hover { background: #1aaa53; transform: translateY(-3px); color: #fff; }

/* ── RESPONSIVE ── */
@media (max-width: 992px) { .destinasi-grid { grid-template-columns: repeat(2,1fr); } }
@media (max-width: 640px) {
    .destinasi-grid { grid-template-columns: 1fr; }
    .filter-bar { flex-direction: column; align-items: flex-start; }
    .destinasi-hero { height: 50vh; }
}
</style>
@endpush

@push('js')
<script>
// Filter
const tabs = document.querySelectorAll('.filter-tab');
const grid = document.getElementById('destinasiGrid');

function getCards() {
    return grid ? Array.from(grid.querySelectorAll('.dest-card')) : [];
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
document.getElementById('sortSelect')?.addEventListener('change', function () {
    if (!grid) return;
    const cards = getCards();
    cards.sort((a, b) => {
        const na = a.dataset.nama.toLowerCase();
        const nb = b.dataset.nama.toLowerCase();
        if (this.value === 'az') return na.localeCompare(nb);
        if (this.value === 'za') return nb.localeCompare(na);
        return 0;
    });
    cards.forEach(card => grid.appendChild(card));
});
</script>
@endpush