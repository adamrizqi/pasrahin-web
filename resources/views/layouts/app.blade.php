<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
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
            background-color: #0f172a; /* slate-900 */
            background-image: radial-gradient(#334155 1px, transparent 1px);
            background-size: 24px 24px;
        }
        /* Custom scrollbar for webkit */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0f172a;
        }
        ::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #475569;
        }
    </style>
</head>
<body class="text-white font-sans antialiased min-h-screen p-4 md:p-6 lg:p-8 flex justify-center">

    {{-- Main Container Box --}}
    <div class="w-full max-w-7xl bg-[#0f172a] md:bg-[#111827] border border-slate-800 rounded-[2rem] shadow-2xl flex flex-col min-h-[calc(100vh-4rem)] relative overflow-hidden">
        
        {{-- Navigation --}}
        @if(!isset($hideNavbar) || !$hideNavbar)
        <nav class="border-b border-slate-800/60 bg-[#111827]/80 backdrop-blur-md px-6 md:px-10 py-5 flex flex-wrap items-center justify-between gap-4 relative z-10">
            <div class="flex items-center gap-8 lg:gap-16">
                {{-- Logo --}}
                <a href="/" class="flex items-center gap-4 group">
                    <img src="{{ asset('logo lengkap.png') }}" alt="Pasrah.in" class="h-14 w-auto drop-shadow-[0_0_10px_rgba(99,102,241,0.2)]">
                    <span class="text-lg font-bold text-white tracking-tight group-hover:text-indigo-100 transition-colors hidden sm:inline-block border-l border-slate-800 pl-4">
                        <span class="text-slate-500 font-normal"> Home</span>
                    </span>
                </a>
                
                {{-- Links --}}
                <div class="flex items-center gap-4 md:gap-8">
                    <a href="/" class="text-sm font-medium {{ request()->is('/') ? 'text-indigo-400 border-b-2 border-indigo-400 pb-1 -mb-[3px]' : 'text-slate-400 hover:text-white transition-colors' }}">Services</a>
                    
                    @auth
                        @if(auth()->user()->role === 'mitra')
                            <a href="{{ route('mitra.dashboard') }}" class="text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400 hover:opacity-80 transition-opacity">
                                Mitra Area
                            </a>
                        @elseif(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="text-sm font-medium {{ request()->is('admin*') ? 'text-indigo-400 border-b-2 border-indigo-400 pb-1 -mb-[3px]' : 'text-slate-400 hover:text-white transition-colors' }}">Admin Dashboard</a>
                        @elseif(auth()->user()->role === 'customer')
                            <a href="{{ route('customer.dashboard') }}" class="text-sm font-medium {{ request()->is('customer*') ? 'text-indigo-400 border-b-2 border-indigo-400 pb-1 -mb-[3px]' : 'text-slate-400 hover:text-white transition-colors' }}">Riwayat Pesanan</a>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="flex items-center gap-4 lg:gap-6">
                {{-- Sign In / Logout Button --}}
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-6 py-2.5 text-xs font-bold bg-slate-800 hover:bg-slate-700 text-white rounded-full transition-colors border border-slate-700">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2.5 text-xs font-bold bg-indigo-500 hover:bg-indigo-400 text-white rounded-full transition-all shadow-[0_0_15px_rgba(99,102,241,0.4)]">Sign In</a>
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
