@extends('layouts.app', ['hideNavbar' => true])

@section('title', 'Riwayat Pesanan - Pasrah.in')

@section('content')
<div class="flex h-full min-h-[calc(100vh-4rem)]">
    {{-- Sidebar --}}
    <aside class="w-64 bg-white border-r border-slate-200 hidden md:flex flex-col relative z-10">
        <div class="p-6 flex-1 flex flex-col">
            <a href="/" class="flex items-center gap-2 group mb-10">
                <div class="flex items-center gap-3 mb-8">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="h-10 w-auto">
                </div>
                <span class="text-lg font-bold text-slate-800 tracking-tight group-hover:text-brand-500 transition-colors">
                    Pasrah.in <span class="text-slate-500 font-normal">| Mitra</span>
                </span>
            </a>

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
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('mitra.orders.history') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('mitra.orders.history') ? 'bg-brand-500 text-white shadow-lg shadow-brand-500/20' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-100' }} text-xs font-medium transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Riwayat Pesanan
                </a>
                <a href="{{ route('mitra.settings') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('mitra.settings') ? 'bg-brand-500 text-white shadow-lg shadow-brand-500/20' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-100' }} text-xs font-medium transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Pengaturan
                </a>
            </nav>

            {{-- Bottom Actions --}}
            <div class="mt-8 space-y-2">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:text-slate-800 hover:bg-slate-100 text-xs font-medium transition-all text-left">
                        <svg class="w-4 h-4 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
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
                Riwayat Pesanan
            </h1>
            <p class="text-sm text-slate-400 leading-relaxed">
                Semua pesanan yang pernah Anda ambil dan kerjakan.
            </p>
        </div>

        <div class="space-y-4">
            @forelse($orders as $order)
            <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm flex flex-col md:flex-row gap-5 items-start md:items-center">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="px-3 py-1 bg-brand-50 text-brand-600 text-[10px] font-bold rounded-full border border-brand-200 uppercase tracking-wider">
                            {{ $order->service_type }}
                        </span>
                        <span class="text-[11px] text-slate-500">{{ $order->created_at->format('d M Y, H:i') }}</span>
                        @if($order->status === 'completed')
                        <span class="px-2 py-0.5 bg-emerald-50 text-emerald-600 text-[10px] font-bold rounded-full border border-emerald-200">SELESAI</span>
                        @elseif($order->status === 'taken')
                        <span class="px-2 py-0.5 bg-amber-50 text-amber-600 text-[10px] font-bold rounded-full border border-amber-200">DIPROSES</span>
                        @endif
                    </div>
                    <h4 class="text-base font-bold text-slate-800 mb-1">{{ $order->details }}</h4>
                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-6 text-xs text-slate-400 mt-3">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="truncate max-w-[150px]">{{ $order->pickup_location }}</span>
                        </div>
                        <div class="hidden sm:block text-slate-600">→</div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="truncate max-w-[150px]">{{ $order->dropoff_location }}</span>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-auto flex flex-row md:flex-col items-center md:items-end justify-between gap-3 min-w-[140px]">
                    <div class="text-left md:text-right">
                        <p class="text-[10px] text-slate-400 font-medium mb-0.5 uppercase tracking-wider">Pendapatan</p>
                        <p class="text-xl font-bold text-slate-800 tracking-tight">Rp {{ number_format($order->bid_price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-16 bg-white border border-slate-200 rounded-2xl">
                <div class="w-16 h-16 mx-auto bg-slate-800/50 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-800 mb-2">Belum ada riwayat pesanan</h3>
                <p class="text-sm text-slate-400">Anda belum menyelesaikan pesanan apa pun.</p>
            </div>
            @endforelse

            <div class="mt-6">
                {{ $orders->links() }}
            </div>
        </div>
    </main>
</div>
@endsection