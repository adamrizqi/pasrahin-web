@extends('layouts.app')

@section('title', 'Pasrah.in - Your Campus Survival Kit')

@section('content')
<div class="grid lg:grid-cols-2 gap-12 p-8 md:p-12 lg:p-16 flex-1">
    {{-- Left: Hero Text --}}
    <div class="flex flex-col justify-center max-w-xl">
        <h1 class="text-4xl md:text-5xl lg:text-[3.5rem] font-extrabold leading-[1.1] tracking-tight text-white mb-6">
            Your Campus<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-300 to-purple-300">Survival Kit</span>
        </h1>

        <p class="text-base md:text-lg text-slate-400 mb-8 leading-relaxed">
            Bantu urusin jastip makanan, print tugas, angkut barang dan lain-lain area UNEJ. Pasrahin aja ke kami!
        </p>

        <div>
            <button onclick="document.getElementById('service_type_makanan').focus()" class="px-8 py-3 bg-indigo-500 hover:bg-indigo-400 text-white font-semibold rounded-xl shadow-[0_0_20px_rgba(99,102,241,0.4)] transition-all hover:-translate-y-0.5">
                Pesan Sekarang
            </button>
        </div>

        <div class="w-full h-px bg-slate-800 my-10"></div>

        {{-- How It Works --}}
        <div>
            <h3 class="text-sm font-semibold text-indigo-300 mb-6 tracking-wide">How It Works</h3>
            <div class="space-y-6">
                <div class="flex gap-4 items-start">
                    <div class="w-8 h-8 rounded-full bg-indigo-500/20 flex items-center justify-center flex-shrink-0 mt-0.5 border border-indigo-500/30">
                        <span class="text-xs font-bold text-indigo-300">1</span>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white mb-1">Pesan & Bayar (Aman)</h4>
                        <p class="text-[13px] text-slate-400 leading-snug">Isi detail dan bayar total biaya (barang + jasa) di awal. Dana aman ditahan sistem.</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                    <div class="w-8 h-8 rounded-full bg-indigo-500/20 flex items-center justify-center flex-shrink-0 mt-0.5 border border-indigo-500/30">
                        <span class="text-xs font-bold text-indigo-300">2</span>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white mb-1">Mitra Menjalankan Tugas</h4>
                        <p class="text-[13px] text-slate-400 leading-snug">Mitra menerima pesanan dan membelikan barang atau menjalankan jasa untukmu.</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                    <div class="w-8 h-8 rounded-full bg-indigo-500/20 flex items-center justify-center flex-shrink-0 mt-0.5 border border-indigo-500/30">
                        <span class="text-xs font-bold text-indigo-300">3</span>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white mb-1">Konfirmasi & Cairkan</h4>
                        <p class="text-[13px] text-slate-400 leading-snug">Setelah beres, klik "Konfirmasi Terima" agar dana diteruskan ke saldo Mitra.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Right: Order Form --}}
    <div class="flex items-center justify-center lg:justify-end mt-8 lg:mt-0">
        <div class="w-full max-w-[500px] bg-[#1e293b] border border-slate-700/60 rounded-3xl p-6 md:p-8 shadow-2xl">
            <h2 class="text-xl font-bold text-white mb-6">Pesan Layanan</h2>

            <form action="{{ route('orders.store') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Service Type --}}
                <div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <label class="relative cursor-pointer">
                            <input type="radio" name="service_type" id="service_type_makanan" value="makanan" class="peer sr-only" required checked onchange="toggleCustomService()">
                            <div class="flex flex-col items-center justify-center gap-2 h-20 rounded-xl border border-slate-700 bg-[#0f172a]/50 peer-checked:border-indigo-500 peer-checked:bg-indigo-500/10 hover:bg-[#0f172a] transition-all">
                                <svg class="w-6 h-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                <span class="text-[11px] font-medium text-slate-400 peer-checked:text-indigo-200 text-center">Jastip Makanan</span>
                            </div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="service_type" value="print" class="peer sr-only" onchange="toggleCustomService()">
                            <div class="flex flex-col items-center justify-center gap-2 h-20 rounded-xl border border-slate-700 bg-[#0f172a]/50 peer-checked:border-indigo-500 peer-checked:bg-indigo-500/10 hover:bg-[#0f172a] transition-all">
                                <svg class="w-6 h-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                                <span class="text-[11px] font-medium text-slate-400 peer-checked:text-indigo-200 text-center">Print Tugas</span>
                            </div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="service_type" value="angkut" class="peer sr-only" onchange="toggleCustomService()">
                            <div class="flex flex-col items-center justify-center gap-2 h-20 rounded-xl border border-slate-700 bg-[#0f172a]/50 peer-checked:border-indigo-500 peer-checked:bg-indigo-500/10 hover:bg-[#0f172a] transition-all">
                                <svg class="w-6 h-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                <span class="text-[11px] font-medium text-slate-400 peer-checked:text-indigo-200 text-center">Angkut Barang</span>
                            </div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="service_type" value="lainnya" id="radio_lainnya" class="peer sr-only" onchange="toggleCustomService()">
                            <div class="flex flex-col items-center justify-center gap-2 h-20 rounded-xl border border-slate-700 bg-[#0f172a]/50 peer-checked:border-indigo-500 peer-checked:bg-indigo-500/10 hover:bg-[#0f172a] transition-all">
                                <svg class="w-6 h-6 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m12 4a2 2 0 100-4m0 4a2 2 0 110-4m-6 0a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m-6-2.5v2.5m-6-2.5v2.5M13 13.177V21h-2v-7.823l-5.23-5.23 1.414-1.414L12 11.35l4.816-4.816 1.414 1.414-5.23 5.23z"/></svg>
                                <span class="text-[11px] font-medium text-slate-400 peer-checked:text-indigo-200 text-center">Lainnya</span>
                            </div>
                        </label>
                    </div>
                    
                    {{-- Custom Service Input (Hidden by default) --}}
                    <div id="custom_service_container" class="hidden mt-3">
                        <input type="text" name="custom_service" id="custom_service" placeholder="Contoh: Beliin obat di apotek" class="w-full px-4 py-3 bg-[#0f172a] border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-colors text-[13px]">
                    </div>

                    @error('service_type')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- WhatsApp --}}
                <div>
                    <label for="whatsapp_number" class="block text-[11px] font-bold text-slate-400 mb-1.5">No. WhatsApp</label>
                    <input type="text" name="whatsapp_number" id="whatsapp_number" required placeholder="081234567890" value="{{ old('whatsapp_number') }}" class="w-full px-4 py-3 bg-[#0f172a] border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-colors text-[13px]">
                    @error('whatsapp_number')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Details --}}
                <div>
                    <label for="details" class="block text-[11px] font-bold text-slate-400 mb-1.5">Detail Pesanan</label>
                    <textarea name="details" id="details" rows="3" required placeholder="Contoh: Beliin nasi padang di bundaran, lauk ayam bakar..." class="w-full px-4 py-3 bg-[#0f172a] border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-colors resize-none text-[13px]">{{ old('details') }}</textarea>
                    @error('details')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Locations --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="pickup_location" class="block text-[11px] font-bold text-slate-400 mb-1.5">Lokasi Jemput/Beli</label>
                        <input type="text" name="pickup_location" id="pickup_location" required placeholder="Warung Padang Bundaran" value="{{ old('pickup_location') }}" class="w-full px-4 py-3 bg-[#0f172a] border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-colors text-[13px]">
                        @error('pickup_location')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="dropoff_location" class="block text-[11px] font-bold text-slate-400 mb-1.5">Lokasi Antar</label>
                        <input type="text" name="dropoff_location" id="dropoff_location" required placeholder="Fasilkom Gedung A" value="{{ old('dropoff_location') }}" class="w-full px-4 py-3 bg-[#0f172a] border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-colors text-[13px]">
                        @error('dropoff_location')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Pricing --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="item_price" class="block text-[11px] font-bold text-slate-400 mb-1.5">Estimasi Harga Barang</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[13px] text-slate-400 font-semibold">Rp</span>
                            <input type="number" name="item_price" id="item_price" min="0" step="500" placeholder="0" value="{{ old('item_price', 0) }}" class="w-full pl-11 pr-4 py-3 bg-[#0f172a] border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-colors text-[13px]">
                        </div>
                        <p class="mt-1 text-[9px] text-slate-500 italic">Isi jika Mitra perlu menalangi barang.</p>
                        @error('item_price')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="bid_price" class="block text-[11px] font-bold text-slate-400 mb-1.5">Harga Tawaran (Ongkir)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[13px] text-slate-400 font-semibold">Rp</span>
                            <input type="number" name="bid_price" id="bid_price" required min="1000" step="500" placeholder="5000" value="{{ old('bid_price') }}" class="w-full pl-11 pr-4 py-3 bg-[#0f172a] border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-colors text-[13px]">
                        </div>
                        <p class="mt-1 text-[9px] text-slate-500 italic">Upah/Jasa untuk Mitra.</p>
                        @error('bid_price')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Admin Fee Notice --}}
                <div class="flex items-center gap-2.5 px-4 py-3 bg-[#2e1065]/40 border border-[#4c1d95]/50 rounded-xl">
                    <svg class="w-4 h-4 text-purple-300 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p class="text-[11px] font-medium text-purple-200">Biaya Admin FLAT Rp 1.000</p>
                </div>

                {{-- Submit --}}
                @auth
                    @if(auth()->user()->role === 'customer')
                        <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-[#6366f1] to-[#a855f7] hover:from-[#4f46e5] hover:to-[#9333ea] text-white font-bold text-sm rounded-xl shadow-[0_0_15px_rgba(99,102,241,0.3)] transition-all duration-200 mt-2">
                            Pasrahin Sekarang! 🚀
                        </button>
                    @else
                        <div class="text-center py-3.5 bg-slate-800 border border-slate-700 text-slate-400 font-bold text-sm rounded-xl mt-2 cursor-not-allowed">
                            Hanya Customer yang bisa memesan
                        </div>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="block text-center w-full py-3.5 bg-slate-800 hover:bg-slate-700 text-white font-bold text-sm rounded-xl shadow-lg border border-slate-700 transition-all duration-200 mt-2">
                        Login Dulu Untuk Memesan 🔒
                    </a>
                @endauth
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function toggleCustomService() {
        const isLainnya = document.getElementById('radio_lainnya').checked;
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
