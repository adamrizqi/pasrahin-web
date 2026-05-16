@extends('layouts.app')

@section('title', 'Pasrah.in - Your Campus Survival Kit')

@section('content')
<div class="flex flex-col flex-1 relative">
    {{-- Background Blobs (Wrapped in overflow-hidden to prevent spilling) --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
        <div class="bg-blob top-[-100px] left-[-100px]"></div>
        <div class="bg-blob bottom-[-100px] right-[-100px]" style="animation-delay: -5s; background: radial-gradient(circle, rgba(64,106,175,0.10) 0%, rgba(64,106,175,0.03) 50%, transparent 100%);"></div>
    </div>

    {{-- Section 1: Hero --}}
    <div class="min-h-[calc(100vh-10rem)] flex flex-col justify-center p-8 md:p-12 lg:p-16 border-b border-slate-200/80 relative z-10 bg-gradient-to-br from-slate-100 via-brand-50 to-slate-200/50">
        <div class="flex flex-col items-center text-center max-w-4xl mx-auto mb-20">
            {{-- Hero Text --}}
            <h1 class="text-4xl md:text-5xl lg:text-[5rem] font-black leading-[1.05] tracking-tight text-slate-700 mb-6">
                Your Campus<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-500 via-brand-400 to-brand-600 bg-[length:200%_auto] animate-gradient">Survival Kit</span>
            </h1>
            <p class="text-base md:text-lg text-slate-500 mb-10 leading-relaxed max-w-2xl">
                Bantu urusin jastip makanan, print tugas, angkut barang dan lain-lain area UNEJ. <span class="text-brand-500 font-bold">Pasrah.in</span> aja ke kami! Aman dan Terpercaya.
            </p>
            
            <div class="flex flex-wrap justify-center gap-6 items-center mb-12">
                <a href="#services" class="px-8 py-4 bg-brand-500 hover:bg-brand-600 text-white font-bold rounded-2xl shadow-xl shadow-brand-500/25 transition-all flex items-center gap-3 group">
                    Mulai Pesan Sekarang
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>


        </div>

        {{-- How It Works (Full Width Below) --}}
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-slate-100/80 border border-slate-200/80 rounded-[2rem] p-8 relative overflow-hidden group hover:border-brand-300 hover:shadow-lg hover:shadow-brand-500/5 transition-all duration-500">
                <div class="flex gap-6 items-start">
                    <div class="w-12 h-12 rounded-2xl bg-brand-50 flex items-center justify-center flex-shrink-0 border border-brand-200 group-hover:scale-110 group-hover:bg-brand-500 group-hover:text-white transition-all">
                        <span class="text-sm font-bold text-brand-500 group-hover:text-white">1</span>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-slate-800 mb-2">Pesan & Bayar</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">Pilih layanan, isi detail, dan bayar dengan aman melalui sistem Escrow Midtrans.</p>
                    </div>
                </div>
            </div>
            <div class="bg-slate-100/80 border border-slate-200/80 rounded-[2rem] p-8 relative overflow-hidden group hover:border-brand-300 hover:shadow-lg hover:shadow-brand-500/5 transition-all duration-500">
                <div class="flex gap-6 items-start">
                    <div class="w-12 h-12 rounded-2xl bg-brand-100 flex items-center justify-center flex-shrink-0 border border-brand-200 group-hover:scale-110 group-hover:bg-brand-500 group-hover:text-white transition-all">
                        <span class="text-sm font-bold text-brand-600 group-hover:text-white">2</span>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-slate-800 mb-2">Mitra Bergerak</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">Mitra kami yang terverifikasi akan segera menjalankan tugas Anda.</p>
                    </div>
                </div>
            </div>
            <div class="bg-slate-100/80 border border-slate-200/80 rounded-[2rem] p-8 relative overflow-hidden group hover:border-brand-300 hover:shadow-lg hover:shadow-brand-500/5 transition-all duration-500">
                <div class="flex gap-6 items-start">
                    <div class="w-12 h-12 rounded-2xl bg-brand-50 flex items-center justify-center flex-shrink-0 border border-brand-200 group-hover:scale-110 group-hover:bg-brand-500 group-hover:text-white transition-all">
                        <span class="text-sm font-bold text-brand-500 group-hover:text-white">3</span>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-slate-800 mb-2">Selesai & Konfirmasi</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">Konfirmasi pesanan diterima, dan dana otomatis dicairkan ke saldo Mitra.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Section 2: Services Form --}}
    <div id="services" class="p-8 md:p-16 lg:p-24 flex flex-col items-center relative">
        {{-- Section Title --}}
        <div class="text-center mb-16 relative z-10">
            <h2 class="text-4xl md:text-5xl font-black text-slate-800 mb-4 tracking-tight">Pilih Layanan</h2>
            <p class="text-slate-500 max-w-md mx-auto text-sm">Butuh bantuan apa hari ini? Mitra kami siap membantu kebutuhan kampusmu dengan aman dan cepat.</p>
        </div>

        {{-- The Form Card --}}
        <div class="w-full max-w-3xl bg-slate-50/95 backdrop-blur-sm border border-slate-200/80 rounded-[3rem] p-8 md:p-12 shadow-xl shadow-slate-200/50 relative z-10">
            {{-- Decorative glow behind form --}}
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-brand-500/5 blur-[100px] rounded-full"></div>
            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-brand-400/5 blur-[100px] rounded-full"></div>

            <form action="{{ route('orders.store') }}" method="POST" class="space-y-10 relative">
                @csrf

                {{-- Step 1: Service Selection --}}
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-500 text-white text-[10px] font-black flex items-center justify-center">1</span>
                        <h3 class="text-xs font-bold text-slate-600 uppercase tracking-widest">Kategori Layanan</h3>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        @php
                            $services = [
                                ['id' => 'makanan', 'label' => 'Jastip Makanan', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>', 'color' => 'brand'],
                                ['id' => 'print', 'label' => 'Print Tugas', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>', 'color' => 'brand'],
                                ['id' => 'angkut', 'label' => 'Angkut Barang', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>', 'color' => 'brand'],
                                ['id' => 'lainnya', 'label' => 'Lainnya', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m12 4a2 2 0 100-4m0 4a2 2 0 110-4m-6 0a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m-6-2.5v2.5m-6-2.5v2.5M13 13.177V21h-2v-7.823l-5.23-5.23 1.414-1.414L12 11.35l4.816-4.816 1.414 1.414-5.23 5.23z"/>', 'color' => 'brand'],
                            ];
                        @endphp

                        @foreach($services as $s)
                        <label class="relative cursor-pointer group">
                            <input type="radio" name="service_type" id="service_type_{{ $s['id'] }}" value="{{ $s['id'] }}" class="peer sr-only" {{ $s['id'] === 'makanan' ? 'checked' : '' }} onchange="toggleCustomService()">
                            <div class="flex flex-col items-center justify-center gap-3 h-28 rounded-2xl border border-slate-200 bg-slate-50/50 peer-checked:border-brand-500 peer-checked:bg-brand-50 peer-checked:ring-1 peer-checked:ring-brand-500/50 hover:bg-slate-100 transition-all duration-300">
                                <div class="w-12 h-12 rounded-xl bg-white flex items-center justify-center text-slate-400 group-hover:scale-110 transition-transform shadow-sm border border-slate-100">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">{!! $s['icon'] !!}</svg>
                                </div>
                                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-tight text-center">{{ $s['label'] }}</span>
                            </div>
                        </label>
                        @endforeach
                    </div>
                    
                    <div id="custom_service_container" class="hidden mt-4">
                        <input type="text" name="custom_service" id="custom_service" placeholder="Apa yang kamu butuhkan?" class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500/50 transition-all text-sm">
                    </div>
                </div>

                {{-- Step 2: Information & Details --}}
                <div class="grid md:grid-cols-2 gap-10">
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-400 text-white text-[10px] font-black flex items-center justify-center">2</span>
                            <h3 class="text-xs font-bold text-slate-600 uppercase tracking-widest">Kontak & Detail</h3>
                        </div>
                        
                        <div class="space-y-5">
                            <div class="group">
                                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">No. WhatsApp</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-brand-500 transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                    </span>
                                    <input type="text" name="whatsapp_number" id="whatsapp_number" required placeholder="08..." value="{{ old('whatsapp_number') }}" class="w-full pl-11 pr-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500/50 transition-all text-sm">
                                </div>
                            </div>

                            <div class="group">
                                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Keterangan Pesanan</label>
                                <textarea name="details" id="details" rows="4" required placeholder="Jelaskan secara detail barang/jasa yang diinginkan..." class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500/50 transition-all text-sm resize-none">{{ old('details') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-500 text-white text-[10px] font-black flex items-center justify-center">3</span>
                            <h3 class="text-xs font-bold text-slate-600 uppercase tracking-widest">Lokasi & Biaya</h3>
                        </div>

                        <div class="space-y-5">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Lokasi Jemput</label>
                                    <input type="text" name="pickup_location" id="pickup_location" required placeholder="Cth: Kantin Teknik" class="w-full px-4 py-4 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 text-xs focus:border-brand-500 outline-none transition-all">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Lokasi Antar</label>
                                    <input type="text" name="dropoff_location" id="dropoff_location" required placeholder="Cth: Gedung A" class="w-full px-4 py-4 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 text-xs focus:border-brand-500 outline-none transition-all">
                                </div>
                            </div>

                            <div class="p-6 rounded-[2rem] bg-slate-50 border border-slate-200 space-y-4">
                                <div class="flex justify-between items-center">
                                    <div class="flex flex-col">
                                        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Harga Barang</label>
                                        <span class="text-[9px] text-slate-400">Total belanja Mitra</span>
                                    </div>
                                    <div class="relative w-36">
                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[11px] text-slate-400 font-bold">Rp</span>
                                        <input type="number" name="item_price" id="item_price" value="0" class="w-full pl-9 pr-3 py-2.5 bg-white border border-slate-200 rounded-xl text-slate-800 text-sm outline-none focus:border-brand-500">
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex flex-col">
                                        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Upah Jasa (Bid)</label>
                                        <span class="text-[9px] text-slate-400">Keuntungan untuk Mitra</span>
                                    </div>
                                    <div class="relative w-36">
                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[11px] text-slate-400 font-bold">Rp</span>
                                        <input type="number" name="bid_price" id="bid_price" required placeholder="5000" class="w-full pl-9 pr-3 py-2.5 bg-white border border-slate-200 rounded-xl text-slate-800 text-sm outline-none focus:border-brand-500">
                                    </div>
                                </div>
                                <div class="h-px bg-slate-200 my-2"></div>
                                <div class="flex justify-between items-center">
                                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Admin Maintenance</span>
                                    <span class="text-xs font-bold text-brand-500">Rp 1.000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Action Button --}}
                <div class="pt-6">
                    @auth
                        @if(auth()->user()->role === 'customer')
                            <button type="submit" class="w-full py-6 bg-gradient-to-r from-brand-500 via-brand-400 to-brand-600 bg-[length:200%_auto] hover:bg-[100%_0] text-white font-black text-sm rounded-[2rem] shadow-2xl shadow-brand-500/30 transition-all duration-500 flex items-center justify-center gap-3 group">
                                PASRAHIN SEKARANG!
                                <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                        @else
                            <div class="w-full py-6 bg-slate-100 text-slate-400 font-bold text-center rounded-[2rem] border border-slate-200 cursor-not-allowed">
                                Hanya Customer yang bisa memesan
                            </div>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="block w-full py-6 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-center rounded-[2rem] border border-slate-200 transition-all">
                            Login Dulu Untuk Memesan
                        </a>
                    @endauth
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function toggleCustomService() {
        const isLainnya = document.getElementById('service_type_lainnya').checked;
        const container = document.getElementById('custom_service_container');
        const input = document.getElementById('custom_service');
        
        if (isLainnya) {
            container.classList.remove('hidden');
            input.setAttribute('required', 'required');
            input.focus();
        } else {
            container.classList.add('hidden');
            input.removeAttribute('required');
            input.value = '';
        }
    }
</script>
@endpush
