@extends('layouts.app', ['hideNavbar' => true])

@section('title', 'Mitra Settings - Pasrah.in')

@section('content')
<div class="flex h-full min-h-[calc(100vh-4rem)]">
    {{-- Sidebar --}}
    <aside class="w-64 bg-[#111827] border-r border-slate-800/60 hidden md:flex flex-col relative z-10">
        <div class="p-6">
            <a href="/" class="flex items-center gap-2 group mb-10">
                <div class="w-6 h-6 border-2 border-indigo-400 rounded flex items-center justify-center">
                    <div class="w-2.5 h-2.5 bg-indigo-400 rounded-sm"></div>
                </div>
                <span class="text-lg font-bold text-white tracking-tight group-hover:text-indigo-100 transition-colors">
                    Pasrah.in <span class="text-slate-500 font-normal">| Mitra</span>
                </span>
            </a>

            {{-- User Info --}}
            <div class="mb-8 flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold shadow-lg shadow-indigo-500/30">
                    {{ substr(auth()->user()->name ?? 'M', 0, 1) }}
                </div>
                <div>
                    <p class="text-sm font-bold text-white">{{ auth()->user()->name ?? 'Mitra Pasrahin' }}</p>
                    <p class="text-xs text-slate-400">Aktif</p>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="space-y-2 flex-1">
                <a href="{{ route('mitra.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('mitra.dashboard') ? 'bg-gradient-to-r from-indigo-600/90 to-purple-600/90 text-white shadow-lg shadow-indigo-500/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/50' }} text-xs font-bold transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('mitra.orders.history') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('mitra.orders.history') ? 'bg-gradient-to-r from-indigo-600/90 to-purple-600/90 text-white shadow-lg shadow-indigo-500/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/50' }} text-xs font-medium transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Riwayat Pesanan
                </a>
                <a href="{{ route('mitra.settings') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('mitra.settings') ? 'bg-gradient-to-r from-indigo-600/90 to-purple-600/90 text-white shadow-lg shadow-indigo-500/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/50' }} text-xs font-medium transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Pengaturan
                </a>
            </nav>

            {{-- Bottom Actions --}}
            <div class="mt-8 space-y-2">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-medium transition-all text-left">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 p-6 md:p-10 overflow-y-auto">
        <div class="mb-10 max-w-2xl">
            <h1 class="text-3xl font-extrabold text-white tracking-tight leading-snug mb-3">
                Pengaturan Akun
            </h1>
            <p class="text-sm text-slate-400 leading-relaxed">
                Kelola informasi perbankan Anda untuk mempermudah pencairan saldo (payout).
            </p>
        </div>

        <div class="max-w-xl bg-[#111827] border border-slate-700/60 rounded-2xl p-6 shadow-xl">
            <h3 class="text-sm font-bold text-white mb-6">Detail Bank / E-Wallet</h3>
            <form action="{{ route('mitra.settings.update') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Nama Bank / E-Wallet</label>
                    <input type="text" name="bank_name" required value="{{ auth()->user()->bank_name }}" placeholder="Contoh: BCA / GoPay" class="w-full px-4 py-2.5 bg-[#0f172a] border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Nomor Rekening / No HP</label>
                    <input type="text" name="account_number" required value="{{ auth()->user()->account_number }}" placeholder="Masukkan nomor" class="w-full px-4 py-2.5 bg-[#0f172a] border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all text-sm">
                </div>
                
                <div class="pt-4 border-t border-slate-700/50">
                    <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white text-xs font-bold rounded-xl shadow-[0_0_15px_rgba(99,102,241,0.3)] transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
