@extends('layouts.app')

@php
    $hideNavbar = true;
@endphp

@section('title', 'Admin Users | Pasrah.in')

@section('content')
<div class="flex flex-col md:flex-row h-full flex-1 bg-[#f8fafc] text-slate-800 rounded-[2rem] overflow-hidden">
    {{-- Sidebar (Dark Theme) --}}
    <aside class="w-full md:w-64 flex-shrink-0 flex flex-col bg-[#1e293b]">
        <div class="p-6 flex-1 flex flex-col">
            {{-- Brand --}}
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 rounded-xl bg-slate-800 p-0.5 shadow-lg border border-slate-700">
                    <div class="w-full h-full bg-[#0f172a] rounded-[10px] flex items-center justify-center">
                        <div class="w-3 h-3 bg-gradient-to-br from-indigo-400 to-purple-400 rounded-sm"></div>
                    </div>
                </div>
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
                <h1 class="text-2xl font-extrabold text-indigo-900 tracking-tight mb-1">Users Management</h1>
                <p class="text-xs text-slate-400 font-medium">Manage user accounts and change their roles.</p>
            </div>
        </div>

        {{-- Users Table --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-100">
                            <th class="py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Name</th>
                            <th class="py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Email</th>
                            <th class="py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Role</th>
                            <th class="py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-wider text-right">Change Role</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($users as $user)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="py-4 px-4 text-xs font-bold text-indigo-900">{{ $user->name ?? 'User' }}</td>
                                <td class="py-4 px-4 text-xs text-slate-500 font-medium">{{ $user->email }}</td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[9px] font-bold 
                                        {{ $user->role === 'admin' ? 'bg-rose-50 text-rose-600' : ($user->role === 'mitra' ? 'bg-indigo-50 text-indigo-600' : 'bg-slate-100 text-slate-600') }}">
                                        {{ strtoupper($user->role) }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-right">
                                    <form action="{{ route('admin.users.role.update', $user) }}" method="POST" class="inline-flex items-center gap-2">
                                        @csrf
                                        @method('PATCH')
                                        <select name="role" class="text-[10px] border border-slate-200 rounded px-2 py-1 focus:outline-none focus:border-indigo-500" onchange="this.form.submit()">
                                            <option value="customer" {{ $user->role === 'customer' ? 'selected' : '' }}>Customer</option>
                                            <option value="mitra" {{ $user->role === 'mitra' ? 'selected' : '' }}>Mitra</option>
                                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-xs text-slate-400">Tidak ada pengguna.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                {{ $users->links() }}
            </div>
        </div>
    </main>
</div>
@endsection
