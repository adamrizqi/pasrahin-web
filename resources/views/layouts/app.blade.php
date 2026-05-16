<!DOCTYPE html>
<html lang="id" class="scroll-smooth scroll-pt-[140px]"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pasrahin - Your Campus Survival Kit">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Pasrahin - Your Campus Survival Kit')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #f1f5f9; /* slate-100 */
            background-image: radial-gradient(circle at 2px 2px, #94a3b8 1px, transparent 0); /* slate-400 */
            background-size: 40px 40px;
        }
        .bg-blob {
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(64,106,175,0.12) 0%, rgba(64,106,175,0.04) 50%, transparent 100%);
            filter: blur(80px);
            z-index: -1;
            pointer-events: none;
            animation: pulse-slow 15s infinite alternate;
        }
        @keyframes pulse-slow {
            0% { transform: scale(1) translate(0, 0); }
            100% { transform: scale(1.2) translate(50px, 50px); }
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        .animate-gradient {
            animation: gradient 3s ease infinite;
        }
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-bounce-slow {
            animation: bounce-slow 4s ease-in-out infinite;
        }
        /* Custom scrollbar for webkit */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #e2e8f0;
        }
        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }
    </style>
</head>
<body class="text-slate-800 font-sans antialiased min-h-screen p-4 md:p-6 lg:p-8 flex justify-center">

    {{-- Main Container Box --}}
<div class="w-full max-w-7xl bg-slate-50 border border-slate-200 rounded-[2rem] shadow-2xl flex flex-col min-h-[calc(100vh-4rem)] relative">        
        {{-- Navigation --}}
        @if(!isset($hideNavbar) || !$hideNavbar)
<nav class="border-b border-slate-200 bg-white/90 backdrop-blur-md px-6 md:px-10 py-5 flex flex-wrap items-center justify-between gap-4 sticky top-0 z-[60] rounded-t-[2rem]">            <div class="flex items-center gap-8 lg:gap-16">
                {{-- Logo --}}
                <a href="/" class="flex items-center gap-4 group">
                    <img src="{{ asset('logo lengkap.png') }}" alt="Pasrah.in" class="h-14 w-auto drop-shadow-[0_0_10px_rgba(99,102,241,0.2)]">
                    <span class="text-lg font-bold text-slate-800 tracking-tight group-hover:text-brand-500 transition-colors hidden sm:inline-block border-l border-slate-200 pl-4">
                        <span class="text-slate-400 font-normal"> Home</span>
                    </span>
                </a>
                
                {{-- Links --}}
                <div class="flex items-center gap-4 md:gap-8">
                    <a href="/services" class="text-sm font-medium text-slate-500 hover:text-brand-500 transition-colors">Layanan & Harga</a>
                    
                    @auth
                        @if(auth()->user()->role === 'mitra')
                            <a href="{{ route('mitra.dashboard') }}" class="text-sm font-bold text-brand-500 hover:text-brand-600 transition-colors">
                                Mitra Area
                            </a>
                        @elseif(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="text-sm font-medium {{ request()->is('admin*') ? 'text-brand-500 border-b-2 border-brand-500 pb-1 -mb-[3px]' : 'text-slate-500 hover:text-brand-500 transition-colors' }}">Admin Dashboard</a>
                        @elseif(auth()->user()->role === 'customer')
                            <a href="{{ route('customer.dashboard') }}" class="text-sm font-medium {{ request()->is('customer*') ? 'text-brand-500 border-b-2 border-brand-500 pb-1 -mb-[3px]' : 'text-slate-500 hover:text-brand-500 transition-colors' }}">Riwayat Pesanan</a>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="flex items-center gap-4 lg:gap-6">
                {{-- Sign In / Logout Button --}}
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-6 py-2.5 text-xs font-bold bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-full transition-colors border border-slate-200">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2.5 text-xs font-bold bg-brand-500 hover:bg-brand-600 text-white rounded-full transition-all shadow-[0_4px_14px_rgba(64,106,175,0.35)]">Sign In</a>
                @endauth
            </div>
        </nav>
        @endif

        {{-- Flash Messages --}}
        <div class="absolute top-24 right-6 z-[60] flex flex-col gap-2">
            @if(session('success'))
                <div id="flash-success" class="max-w-sm bg-emerald-500/10 backdrop-blur-xl border border-emerald-500/20 rounded-2xl px-5 py-4 shadow-2xl animate-slide-in">
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-emerald-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <p class="text-sm text-emerald-200 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif
            @if(session('error'))
                <div id="flash-error" class="max-w-sm bg-red-500/10 backdrop-blur-xl border border-red-500/20 rounded-2xl px-5 py-4 shadow-2xl animate-slide-in">
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-red-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </div>
                        <p class="text-sm text-red-200 font-medium">{{ session('error') }}</p>
                    </div>
                </div>
            @endif
        </div>

        {{-- Main Content --}}
        <main class="flex-1 flex flex-col relative z-0">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="border-t border-slate-200 bg-slate-50 pt-16 pb-8 relative overflow-hidden rounded-b-[2rem]">
            <div class="max-w-7xl mx-auto px-8 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                    {{-- Brand --}}
                    <div class="col-span-1 md:col-span-2">
                        <img src="{{ asset('logo lengkap.png') }}" alt="Pasrah.in" class="h-10 mb-6">
                        <p class="text-slate-500 text-sm leading-relaxed max-w-sm">
                            Solusi praktis untuk kebutuhan mahasiswa. Jastip makanan, print tugas, hingga angkut barang, semua jadi lebih mudah dengan Pasrah.in.
                        </p>
                    </div>

                    {{-- Quick Links --}}
                <div>
                    <h4 class="text-slate-800 font-bold text-sm mb-6 uppercase tracking-widest">Layanan</h4>
                    <ul class="space-y-4">
                        <li><a href="/services" class="text-slate-500 hover:text-brand-500 text-sm transition-colors flex items-center gap-2 group"><span class="w-1.5 h-px bg-slate-300 group-hover:w-3 group-hover:bg-brand-500 transition-all"></span> Jastip Makanan</a></li>
                        <li><a href="/services" class="text-slate-500 hover:text-brand-500 text-sm transition-colors flex items-center gap-2 group"><span class="w-1.5 h-px bg-slate-300 group-hover:w-3 group-hover:bg-brand-500 transition-all"></span> Print Tugas</a></li>
                        <li><a href="/services" class="text-slate-500 hover:text-brand-500 text-sm transition-colors flex items-center gap-2 group"><span class="w-1.5 h-px bg-slate-300 group-hover:w-3 group-hover:bg-brand-500 transition-all"></span> Angkut Barang</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div>
                    <h4 class="text-slate-800 font-bold text-sm mb-6 uppercase tracking-widest">Hubungi Kami</h4>
                    <ul class="space-y-4">
                        <li><a href="https://wa.me/6285730740392" target="_blank" class="text-slate-500 hover:text-emerald-600 text-sm transition-colors flex items-center gap-3">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.484 8.412-.003 6.557-5.338 11.892-11.893 11.892-1.997-.001-3.951-.5-5.688-1.448l-6.309 1.656zm6.29-4.143c1.589.943 3.385 1.44 5.217 1.441h.005c5.366 0 9.73-4.364 9.733-9.735.002-2.601-1.011-5.048-2.852-6.889s-4.287-2.855-6.891-2.855c-5.366 0-9.73 4.364-9.732 9.735-.001 1.89.547 3.706 1.586 5.247l-.992 3.616 3.708-.973zm11.233-5.342c-.27-.135-1.597-.788-1.845-.878-.248-.089-.429-.134-.609.135-.181.27-.698.877-.855 1.058-.158.18-.315.202-.586.067-.27-.135-1.139-.42-2.17-1.34-.801-.715-1.341-1.597-1.498-1.867-.158-.27-.017-.417.118-.552.122-.121.27-.315.405-.472.135-.158.18-.27.27-.45.089-.18.045-.337-.023-.472-.067-.135-.609-1.463-.833-2.003-.22-.528-.439-.457-.609-.465-.158-.007-.338-.008-.517-.008-.18 0-.473.067-.72.337-.247.27-.945.923-.945 2.25s.967 2.61 1.102 2.79c.135.18 1.902 2.904 4.609 4.074.645.278 1.147.445 1.538.569.648.206 1.24.177 1.707.108.52-.078 1.597-.652 1.821-1.282.225-.63.225-1.17.158-1.282-.067-.112-.248-.18-.518-.315z"/></svg>
                            WhatsApp Admin
                        </a></li>
                        <li><a href="mailto:support@pasrah.in" class="text-slate-500 hover:text-brand-500 text-sm transition-colors flex items-center gap-3">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            Email Support
                        </a></li>
                        <li><a href="https://instagram.com/pasrah.in_" target="_blank" class="text-slate-500 hover:text-pink-500 text-sm transition-colors flex items-center gap-3">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            Instagram
                        </a></li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-200 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-slate-400 text-[12px]">
                    &copy; {{ date('Y') }} Pasrah.in - Your Campus Survival Kit. All rights reserved.
                </p>
                <div class="flex items-center gap-4">
                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Metode Pembayaran Aman:</span>
                    <div class="flex items-center gap-3 opacity-50 hover:opacity-100 transition-all">
                        <span class="text-[10px] font-black text-slate-600">MIDTRANS</span>
                        <span class="text-[10px] font-black text-slate-600">QRIS</span>
                        <span class="text-[10px] font-black text-slate-600">GOPAY</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>

    <script>
        // Auto-dismiss flash messages
        setTimeout(() => {
            document.querySelectorAll('#flash-success, #flash-error').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateX(100%)';
                el.style.transition = 'all 0.5s ease';
                setTimeout(() => el.remove(), 500);
            });
        }, 4000);
    </script>

    <style>
        @keyframes slide-in {
            from { opacity: 0; transform: translateX(100%); }
            to { opacity: 1; transform: translateX(0); }
        }
        .animate-slide-in {
            animation: slide-in 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>

    @stack('scripts')
</body>
</html>
