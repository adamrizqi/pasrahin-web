@extends('layouts.app')

@php
    $hideNavbar = true;
@endphp

@section('title', 'Mitra Dashboard | Pasrah.in')

@section('content')
<div class="flex flex-col md:flex-row h-full flex-1">
    {{-- Sidebar --}}
    <aside class="w-full md:w-64 border-b md:border-b-0 md:border-r border-slate-200 flex flex-col bg-white">
        <div class="p-6 flex-1 flex flex-col">
            {{-- Brand --}}
            <div class="flex items-center gap-3 mb-8">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-10 w-auto">
                <div>
                    <h2 class="text-sm font-bold text-slate-800 tracking-tight leading-tight">Mitra Dashboard</h2>
                    <p class="text-[10px] text-slate-400 font-medium">Partner Portal</p>
                </div>
            </div>

            {{-- User Info --}}
            <div class="mb-8 flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-brand-500 flex items-center justify-center text-white font-bold shadow-lg shadow-brand-500/20">
                    {{ substr(auth()->user()->name ?? 'M', 0, 1) }}
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-800">{{ auth()->user()->name ?? 'Mitra Pasrahin' }}</p>
                    <p class="text-xs text-slate-400">Aktif</p>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="space-y-2 flex-1">
                <a href="{{ route('mitra.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('mitra.dashboard') ? 'bg-brand-500 text-white shadow-lg shadow-brand-500/20' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-100' }} text-xs font-bold transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('mitra.orders.history') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('mitra.orders.history') ? 'bg-brand-500 text-white shadow-lg shadow-brand-500/20' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-100' }} text-xs font-medium transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Riwayat Pesanan
                </a>
                <a href="{{ route('mitra.settings') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('mitra.settings') ? 'bg-brand-500 text-white shadow-lg shadow-brand-500/20' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-100' }} text-xs font-medium transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Pengaturan
                </a>
            </nav>

            {{-- Bottom Actions --}}
            <div class="mt-8 space-y-2">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:text-slate-800 hover:bg-slate-100 text-xs font-medium transition-all text-left">
                        <svg class="w-4 h-4 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 p-6 md:p-10 overflow-y-auto">
        <div class="mb-10 max-w-2xl">
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight leading-snug mb-3">
                Dashboard Mitra: Ambil pesanan, kerjain, dan cuan!
            </h1>
            <p class="text-sm text-slate-400 leading-relaxed">
                Pantau pesanan aktif dan ambil peluang baru di sekitar kampus UNEJ.
            </p>
        </div>

        {{-- Balance & Payout Section --}}
        <div class="mb-8 grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
            {{-- Balance Card --}}
            <div class="bg-gradient-to-br from-brand-500 to-brand-600 border border-brand-400 rounded-2xl p-6 shadow-xl relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                <div class="relative z-10">
                    <p class="text-sm text-brand-100 font-medium mb-1">Total Saldo Aktif</p>
                    <h2 class="text-4xl font-extrabold text-white mb-4 tracking-tight">Rp {{ number_format(auth()->user()->balance, 0, ',', '.') }}</h2>
                    <p class="text-[11px] text-slate-400">Saldo ini bertambah setiap Anda menyelesaikan pesanan.</p>
                </div>
            </div>

            {{-- Withdrawal Form --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                <h3 class="text-sm font-bold text-slate-800 mb-4 flex items-center gap-2">
                    Tarik Dana (Withdraw)
                </h3>
                <form action="{{ route('mitra.payout.request') }}" method="POST" class="space-y-3">
                    @csrf
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <input type="number" name="amount" required min="10000" max="{{ auth()->user()->balance }}" placeholder="Jumlah (Min 10rb)" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-500 transition-colors text-xs">
                        </div>
                        <div>
                            <input type="text" name="bank_name" required value="{{ auth()->user()->bank_name }}" placeholder="Nama Bank/E-Wallet" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-500 transition-colors text-xs">
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <input type="text" name="account_number" required value="{{ auth()->user()->account_number }}" placeholder="Nomor Rekening / No HP" class="flex-1 px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-slate-800 placeholder-slate-400 focus:outline-none focus:border-brand-500 transition-colors text-xs">
                        <button type="submit" class="px-5 py-2 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs rounded-lg shadow-lg shadow-brand-500/20 transition-all whitespace-nowrap" {{ auth()->user()->balance < 10000 ? 'disabled' : '' }}>
                            Tarik Saldo
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 items-start">
            {{-- Left Column: Available Orders --}}
            <div class="xl:col-span-2">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-bold text-slate-800">Pesanan Tersedia</h2>
                    <span class="px-3 py-1 bg-brand-50 text-brand-600 text-[10px] font-bold rounded-full border border-brand-200">
                        {{ $pendingOrders->count() }} Baru
                    </span>
                </div>

                <div class="space-y-4">
                    @forelse($pendingOrders as $order)
                        <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-6 shadow-sm flex flex-col sm:flex-row gap-6 hover:border-brand-300 transition-colors">
                            {{-- Image placeholder --}}
                            <div class="w-full sm:w-28 h-28 flex-shrink-0 bg-gradient-to-br from-slate-50 to-slate-100 border border-slate-200 rounded-xl relative overflow-hidden flex items-center justify-center">
                                <div class="absolute inset-0 bg-brand-500/5 blur-xl"></div>
                                <div class="relative z-10 flex flex-col items-center gap-1">
                                    @if($order->service_type === 'makanan')
                                        <svg class="w-10 h-10 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                    @elseif($order->service_type === 'print')
                                        <svg class="w-10 h-10 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                                    @elseif($order->service_type === 'angkut')
                                        <svg class="w-10 h-10 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                    @else
                                        <svg class="w-10 h-10 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m12 4a2 2 0 100-4m0 4a2 2 0 110-4m-6 0a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m-6-2.5v2.5m-6-2.5v2.5M13 13.177V21h-2v-7.823l-5.23-5.23 1.414-1.414L12 11.35l4.816-4.816 1.414 1.414-5.23 5.23z"/></svg>
                                    @endif
                                </div>
                            </div>

                            {{-- Details --}}
                            <div class="flex-1 min-w-0 flex flex-col justify-between relative">
                                <div>
                                    <div class="flex items-center gap-3 mb-2">
                                        <span class="px-2.5 py-1 bg-brand-50 text-brand-600 text-[10px] font-bold rounded-md flex items-center gap-1.5">
                                            @if($order->service_type === 'print') <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                                            @elseif($order->service_type === 'makanan') <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z"/></svg>
                                            @else <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg> @endif
                                            Jasa {{ ucfirst($order->service_type) }}
                                        </span>
                                        <span class="text-[10px] text-slate-500 font-medium flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            {{ $order->created_at->timezone('Asia/Jakarta')->diffForHumans() }}
                                        </span>
                                    </div>
                                    <h3 class="text-sm font-bold text-slate-800 mb-3 line-clamp-1 pr-24">{{ $order->details }}</h3>
                                    <div class="space-y-1.5 text-xs">
                                        <div class="flex items-start gap-2">
                                            <svg class="w-3.5 h-3.5 text-slate-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                                            <span class="text-slate-500 w-8">Dari:</span>
                                            <span class="text-slate-300">{{ $order->pickup_location }}</span>
                                        </div>
                                        <div class="flex items-start gap-2">
                                            <svg class="w-3.5 h-3.5 text-slate-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                            <span class="text-slate-500 w-8">Ke:</span>
                                            <span class="text-slate-300">{{ $order->dropoff_location }}</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Price & Action positioned absolutely on sm screens --}}
                                <div class="mt-4 sm:mt-0 sm:absolute sm:top-0 sm:right-0 flex flex-col items-end">
                                    @if($order->item_price > 0)
                                        <div class="flex items-center gap-1.5 mb-1">
                                            <span class="text-[10px] font-bold text-slate-400">Brng: Rp {{ number_format($order->item_price, 0, ',', '.') }}</span>
                                        </div>
                                    @endif
                                    <div class="flex items-baseline gap-1 mb-4">
                                        <span class="text-lg font-bold text-slate-800">Rp {{ number_format($order->bid_price, 0, ',', '.') }}</span>
                                        <span class="text-[10px] text-slate-500 font-medium">ongkir</span>
                                    </div>
                                </div>
                                <div class="mt-4 sm:mt-0 sm:absolute sm:bottom-0 sm:right-0">
                                    <form action="{{ route('mitra.orders.accept', $order) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-5 py-2 bg-brand-500 hover:bg-brand-600 text-white text-[10px] font-bold rounded-lg shadow-[0_4px_14px_rgba(64,106,175,0.25)] transition-all flex items-center gap-2">
                                            GASKEN PESANAN
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white border border-slate-200 rounded-2xl p-8 text-center">
                            <p class="text-sm text-slate-400">Belum ada pesanan baru. Tunggu sebentar lagi!</p>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Right Column: My Orders --}}
            <div class="xl:col-span-1">
                <div class="bg-white border border-slate-200 rounded-[1.5rem] p-6 shadow-sm">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-base font-bold text-slate-800">Pesanan Saya</h2>
                        <a href="{{ route('mitra.orders.history') }}" class="text-[10px] font-semibold text-slate-400 hover:text-brand-500 transition-colors">Lihat Semua</a>
                    </div>

                    <div class="space-y-4">
                        @forelse($myOrders as $order)
                            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 transition-colors hover:bg-white hover:shadow-sm">
                                <div class="flex items-center justify-between mb-3">
                                    @if($order->status === 'in_progress')
                                        <span class="px-2 py-1 bg-brand-50 border border-brand-200 text-brand-600 text-[9px] font-bold rounded-md flex items-center gap-1.5">
                                            Sedang Jalan
                                        </span>
                                    @elseif($order->status === 'finished')
                                        <span class="px-2 py-1 bg-amber-50 border border-amber-200 text-amber-600 text-[9px] font-bold rounded-md flex items-center gap-1.5">
                                            Menunggu Konfirmasi
                                        </span>
                                    @elseif($order->status === 'completed')
                                        <span class="px-2 py-1 bg-emerald-50 border border-emerald-200 text-emerald-600 text-[9px] font-bold rounded-md flex items-center gap-1.5">
                                            Selesai
                                        </span>
                                    @endif
                                    <span class="text-[10px] text-slate-500 font-mono">#ORD-{{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}</span>
                                </div>
                                
                                <h4 class="text-xs font-bold text-slate-800 mb-3 line-clamp-1">{{ $order->details }}</h4>
                                
                                <div class="flex items-center justify-between mt-auto">
                                    <div class="text-[10px]">
                                        <div class="flex flex-col gap-0.5">
                                            <div class="flex gap-1.5">
                                                <span class="text-slate-500">Tujuan:</span>
                                                <span class="text-slate-500 font-medium">{{ $order->dropoff_location }}</span>
                                            </div>
                                            @if($order->item_price > 0)
                                                <div class="flex gap-1.5">
                                                    <span class="text-slate-500">Barang:</span>
                                                    <span class="text-slate-300 font-bold">Rp {{ number_format($order->item_price, 0, ',', '.') }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-[11px] font-bold text-brand-500">Rp {{ number_format($order->bid_price, 0, ',', '.') }}</span>
                                        <div class="text-[8px] text-slate-500 uppercase font-bold tracking-wider">Ongkir</div>
                                    </div>
                                </div>

                                @if($order->status === 'in_progress' || $order->status === 'completed')
                                    <div class="mt-4 pt-3 border-t border-slate-200 flex items-center justify-between gap-2">
                                        <a href="{{ route('chat.index', $order) }}" class="flex-1 text-center px-3 py-1.5 bg-brand-50 hover:bg-brand-100 text-brand-600 border border-brand-200 rounded-md text-[9px] font-bold transition-colors">
                                            Chat Cust
                                        </a>
                                        @if($order->status === 'in_progress')
                                            <form action="{{ route('mitra.orders.complete', $order) }}" method="POST" class="flex-1">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="w-full px-3 py-1.5 bg-emerald-500 hover:bg-emerald-400 text-white text-[9px] font-bold rounded-md shadow-lg shadow-emerald-500/20 transition-all">
                                                    Selesai
                                                </button>
                                            </form>
                                        @else
                                            <div class="flex-1 text-center px-3 py-1.5 bg-slate-100 text-slate-400 border border-slate-200 rounded-md text-[9px] font-bold">
                                                Selesai
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="text-center py-6">
                                <p class="text-xs text-slate-500">Belum ada pesanan yang diambil</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
