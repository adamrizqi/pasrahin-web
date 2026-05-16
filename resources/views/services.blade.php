@extends('layouts.app')

@section('title', 'Layanan & Harga | Pasrah.in')

@section('content')
<div class="flex flex-col flex-1 relative bg-slate-50">
    {{-- Background Decorative --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-brand-500/5 blur-[100px] rounded-full"></div>
        <div class="absolute top-1/2 -left-24 w-80 h-80 bg-slate-400/10 blur-[100px] rounded-full"></div>
    </div>

    {{-- Header --}}
    <div class="pt-16 pb-12 px-8 md:px-16 relative z-10 text-center border-b border-slate-200/80">
        <h1 class="text-4xl md:text-5xl font-black text-slate-800 mb-4 tracking-tight">Daftar Layanan & Estimasi Harga</h1>
        <p class="text-slate-500 max-w-2xl mx-auto text-base">Berbagai kebutuhan kampusmu bisa kami bantu. Berikut adalah perkiraan harga jasa (bid) minimal <span class="font-bold text-brand-600">Rp 5.000</span>. Harga dapat disesuaikan kembali dengan Mitra.</p>
    </div>

    {{-- Services Grid --}}
    <div class="p-8 md:p-16 relative z-10 max-w-6xl mx-auto w-full">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @php
                $services = [
                    [
                        'title' => 'Jastip Makanan & Minuman',
                        'price' => 'Rp 5.000 - Rp 15.000',
                        'desc' => 'Titip belikan makanan atau minuman dari kantin atau sekitar area kampus tanpa harus antri.',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>',
                    ],
                    [
                        'title' => 'Print & Fotokopi Tugas',
                        'price' => 'Rp 5.000 - Rp 20.000',
                        'desc' => 'Malas ke tempat fotokopi? Kami cetakkan dan antarkan tugas makalahmu langsung sampai kelas.',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>',
                    ],
                    [
                        'title' => 'Bantuan Darurat (Motor Mogok)',
                        'price' => 'Rp 15.000 - Rp 30.000',
                        'desc' => 'Motor mogok di tengah jalan? Ban bocor? Atau butuh bantuan darurat lainnya? Mitra siap meluncur.',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>',
                    ],
                    [
                        'title' => 'Joki Game (Push Rank)',
                        'price' => 'Rp 10.000 - Rp 50.000',
                        'desc' => 'Bantuin push rank akun game favoritmu sampai tier/target yang kamu inginkan. Cepat dan aman.',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                    ],
                    [
                        'title' => 'Angkut Barang / Pindahan',
                        'price' => 'Rp 25.000 - Rp 100.000',
                        'desc' => 'Butuh tenaga tambahan untuk angkut barang pindah kosan? Mitra siap bantu bawa barang-barangmu.',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>',
                    ],
                    [
                        'title' => 'Jastip Belanja Keperluan Kos',
                        'price' => 'Rp 10.000 - Rp 25.000',
                        'desc' => 'Titip belanjakan sabun, deterjen, atau keperluan kos lainnya di minimarket terdekat tanpa ribet.',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>',
                    ],
                ];
            @endphp

            @foreach($services as $s)
            <div class="bg-white border border-slate-200/80 rounded-[2rem] p-8 shadow-lg shadow-slate-200/40 hover:shadow-xl hover:border-brand-300 transition-all duration-300 group flex flex-col h-full relative overflow-hidden">
                <div class="w-14 h-14 rounded-2xl bg-brand-50 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-brand-500 group-hover:text-white transition-all text-brand-600">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">{!! $s['icon'] !!}</svg>
                </div>
                
                <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-brand-600 transition-colors">{{ $s['title'] }}</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-1">{{ $s['desc'] }}</p>
                
                <div class="mt-auto pt-6 border-t border-slate-100 flex items-center justify-between">
                    <div class="flex flex-col">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Estimasi Upah Jasa</span>
                        <span class="text-sm font-black text-emerald-600">{{ $s['price'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        {{-- Call to action --}}
        <div class="mt-16 bg-gradient-to-r from-brand-600 to-brand-500 rounded-[2rem] p-10 md:p-14 text-center shadow-2xl shadow-brand-500/20 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4IiBoZWlnaHQ9IjgiPgo8cmVjdCB3aWR0aD0iOCIgaGVpZ2h0PSI4IiBmaWxsPSIjZmZmZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDUiLz4KPC9zdmc+')] opacity-20"></div>
            
            <div class="relative z-10">
                <h2 class="text-2xl md:text-3xl font-black text-white mb-4">Butuh Layanan Lainnya?</h2>
                <p class="text-brand-100 max-w-xl mx-auto mb-8 text-sm leading-relaxed">Apapun kebutuhanmu, jangan ragu untuk memesan. Mitra kami siap membantu segala urusanmu di area kampus.</p>
                <a href="/#services" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-brand-600 font-bold rounded-xl hover:scale-105 transition-transform shadow-xl">
                    Pesan Layanan Sekarang
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
