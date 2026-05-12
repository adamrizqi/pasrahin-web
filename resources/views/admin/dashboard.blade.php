@extends('layouts.app')

@php
    $hideNavbar = true;
@endphp

@section('title', 'Admin Panel | Pasrah.in')

@section('content')
<div class="flex flex-col md:flex-row h-full flex-1 bg-[#f8fafc] text-slate-800 rounded-[2rem] overflow-hidden">
    {{-- Sidebar (Dark Theme) --}}
    <aside class="w-full md:w-64 flex-shrink-0 flex flex-col bg-[#1e293b]">
        <div class="p-6 flex-1 flex flex-col">
            {{-- Brand --}}
            <div class="flex items-center gap-3 mb-8">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-10 w-auto">
                <div>
                    <h2 class="text-sm font-bold text-white tracking-tight leading-tight">Admin Panel</h2>
                    <p class="text-[10px] text-slate-400 font-medium">System Management</p>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="space-y-2 flex-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg shadow-indigo-500/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/80' }} text-xs font-bold transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.orders') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.orders') ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg shadow-indigo-500/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/80' }} text-xs font-medium transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Orders
                </a>
                <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('admin.users') ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg shadow-indigo-500/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/80' }} text-xs font-medium transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    Users
                </a>
            </nav>

            {{-- Bottom Actions --}}
            <div class="mt-8 space-y-2 border-t border-slate-700/50 pt-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/80 text-xs font-medium transition-all text-left">
                        <svg class="w-4 h-4 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- Main Content (Light Theme) --}}
    <main class="flex-1 p-6 md:p-10 overflow-y-auto">
        
        {{-- Header Card --}}
        <div class="bg-white rounded-[1.5rem] p-6 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] mb-8 flex justify-between items-center border border-slate-100">
            <div>
                <h1 class="text-2xl font-extrabold text-indigo-900 tracking-tight mb-1">Overview</h1>
                <p class="text-xs text-slate-400 font-medium">Monitor your Pasrah.in business operations.</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-3 pl-4 border-l border-slate-200">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs font-bold text-slate-700">Admin User</p>
                        <p class="text-[10px] text-slate-400 font-medium">Superadmin</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-indigo-100 border-2 border-white shadow-sm flex items-center justify-center text-indigo-600 font-bold">
                        A
                    </div>
                </div>
            </div>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="bg-gradient-to-br from-indigo-50/50 to-white rounded-2xl p-6 shadow-sm border border-indigo-100/50 relative overflow-hidden">
                <div class="w-10 h-10 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-500 mb-4">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
                <p class="text-[11px] text-slate-400 font-bold uppercase tracking-wider mb-1">Total Orders</p>
                <h3 class="text-3xl font-extrabold text-indigo-900">{{ number_format($stats['total']) }}</h3>
            </div>
            
            <div class="bg-gradient-to-br from-purple-50/50 to-white rounded-2xl p-6 shadow-sm border border-purple-100/50 relative overflow-hidden">
                <div class="w-10 h-10 rounded-xl bg-purple-100 flex items-center justify-center text-purple-500 mb-4">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                </div>
                <p class="text-[11px] text-slate-400 font-bold uppercase tracking-wider mb-1">Pending</p>
                <h3 class="text-3xl font-extrabold text-indigo-900">{{ number_format($stats['pending']) }}</h3>
            </div>

            <div class="bg-gradient-to-br from-sky-50/50 to-white rounded-2xl p-6 shadow-sm border border-sky-100/50 relative overflow-hidden">
                <div class="w-10 h-10 rounded-xl bg-sky-100 flex items-center justify-center text-sky-500 mb-4">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </div>
                <p class="text-[11px] text-slate-400 font-bold uppercase tracking-wider mb-1">In Progress</p>
                <h3 class="text-3xl font-extrabold text-indigo-900">{{ number_format($stats['in_progress']) }}</h3>
            </div>

            <div class="bg-gradient-to-br from-emerald-50/50 to-white rounded-2xl p-6 shadow-sm border border-emerald-100/50 relative overflow-hidden">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-500 mb-4">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <p class="text-[11px] text-slate-400 font-bold uppercase tracking-wider mb-1">Completed</p>
                <h3 class="text-3xl font-extrabold text-indigo-900">{{ number_format($stats['completed']) }}</h3>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
            {{-- Payout Requests Table (New Feature) --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 xl:col-span-2">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-lg font-extrabold text-slate-800">Payout Requests</h2>
                        <p class="text-xs text-slate-400 font-medium">Permintaan pencairan dana dari Mitra.</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-100">
                                <th class="py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Mitra</th>
                                <th class="py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Rekening Tujuan</th>
                                <th class="py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Jumlah</th>
                                <th class="py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Status</th>
                                <th class="py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($payoutRequests as $req)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="py-4 px-4 text-xs font-bold text-indigo-900">{{ $req->mitra->name ?? 'Unknown' }}</td>
                                    <td class="py-4 px-4 text-xs text-slate-500">
                                        <div class="font-bold text-slate-700">{{ $req->bank_name }}</div>
                                        <div class="text-[10px]">{{ $req->account_number }}</div>
                                    </td>
                                    <td class="py-4 px-4 text-xs font-bold text-slate-700">Rp {{ number_format($req->amount, 0, ',', '.') }}</td>
                                    <td class="py-4 px-4">
                                        @if($req->status === 'pending')
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-[9px] font-bold bg-amber-100 text-amber-600">Pending</span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-[9px] font-bold bg-emerald-100 text-emerald-600">Completed</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4 text-right">
                                        @if($req->status === 'pending')
                                            <form action="{{ route('admin.payouts.complete', $req) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="px-3 py-1.5 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white text-[10px] font-bold rounded-lg shadow-md transition-all">
                                                    Transfer Selesai ✓
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-[10px] text-slate-400 font-medium">Selesai</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-8 text-center text-xs text-slate-400">Tidak ada request pencairan dana.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Recent Orders Table --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 xl:col-span-2">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 gap-4">
                    <div>
                        <h2 class="text-lg font-extrabold text-slate-800">Recent Orders</h2>
                        <p class="text-xs text-slate-400 font-medium">Manage and process active requests.</p>
                    </div>
                    <div class="relative">
                        <svg class="w-4 h-4 text-slate-300 absolute left-3 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" placeholder="Search orders..." class="pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-xs focus:outline-none focus:border-indigo-300 focus:ring-1 focus:ring-indigo-300 transition-all w-full sm:w-64">
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-100">
                                <th class="py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Order ID</th>
                                <th class="py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Service</th>
                                <th class="py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Mitra</th>
                                <th class="py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Status</th>
                                <th class="py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($orders->take(10) as $order)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="py-4 px-4 text-xs font-bold text-indigo-200">#ORD-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</td>
                                    <td class="py-4 px-4 text-xs text-slate-500 font-medium">{{ ucfirst($order->service_type) }}</td>
                                    <td class="py-4 px-4 text-xs text-slate-500">{{ $order->mitra->name ?? '-' }}</td>
                                    <td class="py-4 px-4">
                                        @if($order->status === 'pending')
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[9px] font-bold bg-purple-50 text-purple-600">
                                                <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span> Pending
                                            </span>
                                        @elseif($order->status === 'in_progress')
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[9px] font-bold bg-sky-50 text-sky-600">
                                                <span class="w-1.5 h-1.5 rounded-full bg-sky-500"></span> In Progress
                                            </span>
                                        @elseif($order->status === 'finished')
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[9px] font-bold bg-amber-50 text-amber-600">
                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Finished
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[9px] font-bold bg-emerald-50 text-emerald-600">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Completed
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4 text-right">
                                        <a href="{{ route('admin.orders') }}" class="text-slate-300 hover:text-indigo-500 transition-colors inline-block" title="Manage Order">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
