@extends('layouts.app')

@section('title', $mode == 'login' ? 'Login | Pasrah.in' : 'Register | Pasrah.in')

@section('content')
<div class="flex-1 flex items-center justify-center p-4">
    <div class="w-full max-w-[400px] bg-[#111827] border border-slate-800 rounded-2xl p-8 shadow-2xl relative overflow-hidden">
        {{-- Inner glow --}}
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-indigo-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-purple-500/10 rounded-full blur-3xl"></div>

        <div class="relative z-10">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-extrabold text-white mb-2 tracking-tight">Pasrah.in</h1>
                <p class="text-xs text-slate-400">Join the secure student ecosystem</p>
            </div>

            <form action="{{ $mode == 'login' ? route('login.submit') : route('register.submit') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-[11px] font-bold text-slate-400 mb-1.5">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="student@unej.ac.id" class="w-full pl-10 pr-4 py-3 bg-[#0f172a] border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-colors text-[13px]">
                    </div>
                    @error('email')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-[11px] font-bold text-slate-400 mb-1.5">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <input type="password" name="password" id="password" required placeholder="••••••••" class="w-full pl-10 pr-10 py-3 bg-[#0f172a] border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-indigo-500 transition-colors text-[13px]">
                        <button type="button" class="absolute inset-y-0 right-0 pr-3.5 flex items-center" onclick="const p=document.getElementById('password'); p.type=p.type==='password'?'text':'password'">
                            <svg class="w-4 h-4 text-slate-500 hover:text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3 bg-[#6366f1] hover:bg-[#4f46e5] text-white font-semibold text-sm rounded-xl shadow-[0_0_15px_rgba(99,102,241,0.2)] transition-all flex items-center justify-center gap-2">
                        {{ $mode == 'login' ? 'Log In' : 'Create Account' }}
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                </div>
            </form>

            <div class="mt-6 pt-6 border-t border-slate-800 text-center">
                @if($mode == 'login')
                    <p class="text-[12px] text-slate-400">Don't have an account? <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold transition-colors">Register</a></p>
                @else
                    <p class="text-[12px] text-slate-400">Already have an account? <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold transition-colors">Log In</a></p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
