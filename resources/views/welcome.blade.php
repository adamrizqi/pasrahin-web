@extends('layouts.app')

@section('title', 'Pasrahin - Your Campus Survival Kit')

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
                    <div class="w-8 h-8 rounded-full bg-[#1e293b] flex items-center justify-center flex-shrink-0 mt-0.5">
                        <span class="text-xs font-bold text-indigo-300">1</span>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white mb-1">Pilih Layanan & Isi Detail</h4>
                        <p class="text-[13px] text-slate-400 leading-snug">Tentukan apa yang kamu butuhkan dan harganya.</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                    <div class="w-8 h-8 rounded-full bg-[#1e293b] flex items-center justify-center flex-shrink-0 mt-0.5">
                        <span class="text-xs font-bold text-indigo-300">2</span>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white mb-1">Mitra Menerima Pesanan</h4>
                        <p class="text-[13px] text-slate-400 leading-snug">Mitra terdekat akan mengambil pesananmu.</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                    <div class="w-8 h-8 rounded-full bg-[#1e293b] flex items-center justify-center flex-shrink-0 mt-0.5">
                        <span class="text-xs font-bold text-indigo-300">3</span>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white mb-1">Selesai & Bayar</h4>
                        <p class="text-[13px] text-slate-400 leading-snug">Barang sampai, bayar sesuai kesepakatan.</p>
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
                            <div class="flex flex-col items-center justify-center gap-2 h-20 rounded-xl border border-slate-700 bg-[#0f172a]/50 peer-checked:border-indigo-500 peer-checked:bg-[#0f172a] hover:bg-[#0f172a] transition-all">
                                <span class="text-xl leading-none drop-shadow-md">🍔</span>
                                <span class="text-[11px] font-medium text-slate-400 peer-checked:text-indigo-200 text-center">Jastip Makanan</span>
                            </div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="service_type" value="print" class="peer sr-only" onchange="toggleCustomService()">
                            <div class="flex flex-col items-center justify-center gap-2 h-20 rounded-xl border border-slate-700 bg-[#0f172a]/50 peer-checked:border-indigo-500 peer-checked:bg-[#0f172a] hover:bg-[#0f172a] transition-all">
                                <span class="text-xl leading-none drop-shadow-md">🖨️</span>
                                <span class="text-[11px] font-medium text-slate-400 peer-checked:text-indigo-200 text-center">Print Tugas</span>
                            </div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="service_type" value="angkut" class="peer sr-only" onchange="toggleCustomService()">
                            <div class="flex flex-col items-center justify-center gap-2 h-20 rounded-xl border border-slate-700 bg-[#0f172a]/50 peer-checked:border-indigo-500 peer-checked:bg-[#0f172a] hover:bg-[#0f172a] transition-all">
                                <span class="text-xl leading-none drop-shadow-md">📦</span>
                                <span class="text-[11px] font-medium text-slate-400 peer-checked:text-indigo-200 text-center">Angkut Barang</span>
                            </div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="service_type" value="lainnya" id="radio_lainnya" class="peer sr-only" onchange="toggleCustomService()">
                            <div class="flex flex-col items-center justify-center gap-2 h-20 rounded-xl border border-slate-700 bg-[#0f172a]/50 peer-checked:border-indigo-500 peer-checked:bg-[#0f172a] hover:bg-[#0f172a] transition-all">
                                <span class="text-xl leading-none drop-shadow-md">✨</span>
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

                {{-- Bid Price --}}
                <div>
                    <label for="bid_price" class="block text-[11px] font-bold text-slate-400 mb-1.5">Harga Tawaran (Bid Price)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[13px] text-slate-400 font-semibold">Rp</span>
                        <input type="number" name="bid_price" id="bid_price" required min="1000" step="500" placeholder="5000" value="{{ old('bid_price') }}" class="w-full pl-11 pr-4 py-3 bg-[#0f172a] border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-colors text-[13px]">
                    </div>
                    @error('bid_price')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
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
