@extends('layouts.layout')

@section('title', $destinasi->nama_destinasi . ' — LaloeTrip')

@section('content')

{{-- HERO — full image, no text inside --}}
<section class="dest-detail-hero">
    <div class="dest-detail-hero-bg" style="background-image: url('{{ $destinasi->gambar ? asset('storage/' . $destinasi->gambar) : asset('assets/gili.jpg') }}');"></div>
    <div class="dest-detail-hero-dimmer"></div>
    <div class="dest-detail-hero-wave">
        <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="var(--cream)"/>
        </svg>
    </div>
</section>

{{-- MAIN CONTENT --}}
<section style="background:var(--cream); padding:2rem 5% 6rem;">
    <div class="dest-detail-layout">

        {{-- KIRI: JUDUL + DESKRIPSI + PAKET TERKAIT --}}
        <div class="dest-detail-main">

            {{-- JUDUL + DESKRIPSI (digabung 1 card) --}}
            <div class="dest-detail-card">
                <span class="hero-badge" style="border-color:var(--gold); color:var(--gold);">✦ {{ $destinasi->kategori }}</span>
                <h1 class="dest-title-main">{{ $destinasi->nama_destinasi }}</h1>

                <div class="dest-detail-desc">{!! nl2br(e($destinasi->deskripsi)) !!}</div>
            </div>

            {{-- GALERI FOTO --}}
            @if($destinasi->galeri->isNotEmpty())
            <div class="dest-detail-card">
                <h2 class="dest-detail-title">Galeri Foto</h2>

                <div class="dest-galeri-slider-wrap">
                    @if($destinasi->galeri->count() > 3)
                    <button type="button" class="dest-galeri-arrow dest-galeri-arrow-left" onclick="destGaleriScroll(this, -1)" aria-label="Sebelumnya">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                    </button>
                    @endif

                    <div class="dest-galeri-track">
                        @foreach($destinasi->galeri as $foto)
                        <div class="dest-galeri-item" data-bs-toggle="modal" data-bs-target="#galeriModal{{ $foto->id }}">
                            <img src="{{ asset('storage/' . $foto->gambar) }}" alt="{{ $destinasi->nama_destinasi }}" class="dest-galeri-img">
                        </div>

                        <div class="modal fade" id="galeriModal{{ $foto->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content" style="background:transparent; border:none;">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" style="position:absolute; top:-2.2rem; right:0;"></button>
                                    <img src="{{ asset('storage/' . $foto->gambar) }}" class="img-fluid rounded" alt="{{ $destinasi->nama_destinasi }}">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @if($destinasi->galeri->count() > 3)
                    <button type="button" class="dest-galeri-arrow dest-galeri-arrow-right" onclick="destGaleriScroll(this, 1)" aria-label="Selanjutnya">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                    </button>
                    @endif
                </div>
            </div>
            @endif

            {{-- PAKET TERKAIT --}}
            @if($destinasi->paketTrips->isNotEmpty())
            <div class="dest-detail-card">
                <h2 class="dest-detail-title">Tersedia di Paket Trip</h2>
                <div class="paket-terkait-grid">
                    @foreach($destinasi->paketTrips as $paket)
                    <a href="{{ route('paket.show', $paket->slug) }}" class="paket-terkait-card">
                        <div class="paket-terkait-img-wrap">
                            @if($paket->thumbnail)
                                <img src="{{ asset('storage/' . $paket->thumbnail) }}"
                                     alt="{{ $paket->nama_paket }}"
                                     class="paket-terkait-img">
                            @else
                                <div class="paket-terkait-placeholder">🏖️</div>
                            @endif
                            <span class="paket-terkait-tag">{{ $paket->jenis_paket }}</span>
                        </div>
                        <div class="paket-terkait-body">
                            <h4 class="paket-terkait-nama">{{ $paket->nama_paket }}</h4>
                            <div class="paket-terkait-meta">
                                <span>⏱ {{ $paket->durasi }}</span>
                                <span class="paket-terkait-harga">Rp {{ number_format($paket->harga, 0, ',', '.') }}/pax</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

        </div>

        {{-- KANAN: SIDEBAR --}}
        <aside class="dest-detail-sidebar">
            <div class="dest-sidebar-card">
                <div class="dest-sidebar-header">
                    <span class="dest-sidebar-kategori">{{ $destinasi->kategori }}</span>
                    <h3 class="dest-sidebar-nama">{{ $destinasi->nama_destinasi }}</h3>
                </div>

                <div class="dest-sidebar-info">
                    <div class="dest-sidebar-info-item">
                        <span>🗂</span>
                        <div>
                            <div class="dest-sidebar-info-label">Kategori</div>
                            <div class="dest-sidebar-info-val">{{ $destinasi->kategori }}</div>
                        </div>
                    </div>
                    @if($destinasi->paketTrips->isNotEmpty())
                    <div class="dest-sidebar-info-item">
                        <span>📦</span>
                        <div>
                            <div class="dest-sidebar-info-label">Tersedia di</div>
                            <div class="dest-sidebar-info-val">{{ $destinasi->paketTrips->count() }} Paket Trip</div>
                        </div>
                    </div>
                    @endif
                </div>

                <a href="https://wa.me/6285713717336?text=Halo%20LaloeTrip%2C%20saya%20ingin%20mengunjungi%20{{ urlencode($destinasi->nama_destinasi) }}"
                   target="_blank" class="dest-sidebar-wa-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="margin-right:8px;flex-shrink:0">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                        <path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.122 1.532 5.854L.057 23.886l6.183-1.453A11.945 11.945 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.9 0-3.681-.497-5.228-1.367l-.375-.222-3.67.862.878-3.584-.244-.389A9.951 9.951 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/>
                    </svg>
                    Tanya via WhatsApp
                </a>
            </div>

            <a href="{{ route('destinasi.index') }}" class="dest-sidebar-back-btn">
                ← Lihat Destinasi Lainnya
            </a>
        </aside>

    </div>
</section>

@endsection

@push('css')
<style>
/* ── HERO ── */
.dest-detail-hero {
    position: relative;
    height: 55vh;
    min-height: 350px;
    overflow: hidden;
}
.dest-detail-hero-bg {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
}
.dest-detail-hero-dimmer {
    position: absolute;
    inset: 0;
    background: rgba(10,22,40,.35);
    z-index: 1;
}
.dest-detail-hero-wave {
    position: absolute;
    bottom: -1px;
    width: 100%;
    z-index: 15;
}

/* ── LAYOUT ── */
.dest-detail-layout {
    display: grid;
    grid-template-columns: 1fr 320px;
    gap: 2rem;
    align-items: start;
}

/* ── CARD ── */
.dest-detail-card {
    background: #fff;
    border-radius: 20px;
    padding: 2rem 2.2rem;
    box-shadow: 0 4px 24px rgba(0,0,0,.06);
    margin-bottom: 1.8rem;
}

/* ── JUDUL di dalam card ── */
.dest-title-main {
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    font-weight: 700;
    color: var(--dark);
    margin: .6rem 0 .5rem;
    line-height: 1.2;
    border-bottom: 2px solid var(--gold); 
}
.dest-detail-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 1rem;
    padding-bottom: .7rem;
    border-bottom: 2px solid var(--gold);
}
.dest-detail-desc {
    font-size: .92rem;
    color: #4e6070;
    line-height: 1.8;
    margin: 0;
}

/* ── GALERI FOTO (slider) ── */
.dest-galeri-slider-wrap {
    position: relative;
    display: flex;
    align-items: center;
    gap: .5rem;
}
.dest-galeri-track {
    display: flex;
    gap: 1rem;
    overflow-x: auto;
    scroll-behavior: smooth;
    scroll-snap-type: x mandatory;
    padding-bottom: .2rem;
    flex: 1;
    scrollbar-width: none;
}
.dest-galeri-track::-webkit-scrollbar {
    display: none;
}
.dest-galeri-item {
    flex: 0 0 auto;
    width: calc((100% - 2rem) / 3);
    aspect-ratio: 16/10;
    border-radius: 14px;
    overflow: hidden;
    cursor: pointer;
    scroll-snap-align: start;
}
.dest-galeri-img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .3s;
}
.dest-galeri-item:hover .dest-galeri-img {
    transform: scale(1.08);
}
.dest-galeri-arrow {
    flex: 0 0 auto;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: 1px solid rgba(0,0,0,.1);
    background: #fff;
    color: var(--dark);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all .25s;
    box-shadow: 0 4px 14px rgba(0,0,0,.08);
}
.dest-galeri-arrow:hover {
    background: var(--dark);
    color: #fff;
    border-color: var(--dark);
}
@media (max-width: 640px) {
    .dest-galeri-item { width: calc((100% - 1rem) / 2); }
    .dest-galeri-arrow { width: 30px; height: 30px; }
}

/* ── PAKET TERKAIT ── */
.paket-terkait-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}
.paket-terkait-card {
    border-radius: 14px; overflow: hidden;
    border: 1px solid rgba(0,0,0,.07);
    text-decoration: none;
    transition: transform .3s, box-shadow .3s;
    display: block;
}
.paket-terkait-card:hover { transform:translateY(-4px); box-shadow:0 10px 30px rgba(0,0,0,.1); }
.paket-terkait-img-wrap {
    position: relative; height: 120px;
    background: linear-gradient(135deg, var(--dark), #0D2137);
}
.paket-terkait-img { width:100%; height:100%; object-fit:cover; display:block; }
.paket-terkait-placeholder {
    width:100%; height:100%;
    display:flex; align-items:center; justify-content:center; font-size:2rem;
}
.paket-terkait-tag {
    position:absolute; bottom:.6rem; left:.6rem;
    background:rgba(10,22,40,.8); color:#fff;
    font-size:.68rem; font-weight:600;
    padding:.2rem .7rem; border-radius:50px;
}
.paket-terkait-body { padding:.9rem 1rem; }
.paket-terkait-nama {
    font-family:'Playfair Display',serif;
    font-size:.95rem; font-weight:700; color:var(--dark); margin-bottom:.4rem;
}
.paket-terkait-meta {
    display:flex; justify-content:space-between; align-items:center;
    font-size:.75rem; color:#9aacbc;
}
.paket-terkait-harga { color:var(--dark); font-weight:600; }

/* ── SIDEBAR ── */
.dest-detail-sidebar { position:sticky; top:100px; }
.dest-sidebar-card {
    background:#fff; border-radius:20px;
    padding:1.8rem; box-shadow:0 4px 24px rgba(0,0,0,.08);
    border-top:4px solid var(--gold);
    margin-bottom:1rem;
}
.dest-sidebar-header { margin-bottom:1.5rem; padding-bottom:1.5rem; border-bottom:1px solid rgba(0,0,0,.07); }
.dest-sidebar-kategori {
    display:inline-block;
    background:var(--cream); color:var(--dark);
    font-size:.72rem; font-weight:600; padding:.3rem .9rem;
    border-radius:50px; margin-bottom:.6rem;
}
.dest-sidebar-nama {
    font-family:'Playfair Display',serif;
    font-size:1.3rem; font-weight:700; color:var(--dark); margin:0;
}
.dest-sidebar-info { display:flex; flex-direction:column; gap:1rem; margin-bottom:1.5rem; }
.dest-sidebar-info-item { display:flex; align-items:center; gap:.8rem; font-size:1.2rem; }
.dest-sidebar-info-label { font-size:.72rem; color:#9aacbc; margin-bottom:.1rem; }
.dest-sidebar-info-val { font-size:.88rem; font-weight:600; color:var(--dark); }
.dest-sidebar-wa-btn {
    display:flex; align-items:center; justify-content:center;
    background:#25D366; color:#fff;
    padding:.85rem 1.5rem; border-radius:14px;
    font-weight:700; font-size:.9rem; text-decoration:none;
    transition:all .3s; box-shadow:0 6px 20px rgba(37,211,102,.3);
}
.dest-sidebar-wa-btn:hover { background:#1aaa53; transform:translateY(-2px); color:#fff; }
.dest-sidebar-back-btn {
    display:block; text-align:center;
    color:#6a7d90; font-size:.85rem; text-decoration:none;
    padding:.7rem; border-radius:12px;
    border:1.5px solid rgba(0,0,0,.1); transition:all .25s;
}
.dest-sidebar-back-btn:hover { background:var(--dark); color:#fff; border-color:var(--dark); }

/* ── RESPONSIVE ── */
@media (max-width: 992px) {
    .dest-detail-layout { grid-template-columns: 1fr; }
    .dest-detail-sidebar { position:static; }
    .paket-terkait-grid { grid-template-columns: repeat(2,1fr); }
}
@media (max-width: 640px) {
    .dest-detail-hero { height:40vh; min-height:250px; }
    .paket-terkait-grid { grid-template-columns:1fr; }
    .dest-title-main { font-size:1.5rem; }
}
</style>
@endpush

@push('js')
<script>
function destGaleriScroll(btn, dir) {
    const track = btn.closest('.dest-galeri-slider-wrap').querySelector('.dest-galeri-track');
    const itemWidth = track.querySelector('.dest-galeri-item')?.offsetWidth || 200;
    track.scrollBy({ left: dir * (itemWidth + 10), behavior: 'smooth' });
}
</script>
@endpush