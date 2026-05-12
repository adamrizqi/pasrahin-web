@extends('layouts.app')

@php
    $hideNavbar = true;
@endphp

@section('title', 'Chat Order #' . $order->id . ' | Pasrah.in')

@section('content')
<div class="flex flex-col h-screen bg-[#f8fafc]">
    {{-- Header --}}
    <div class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between sticky top-0 z-10 shadow-sm">
        <div class="flex items-center gap-4">
            <a href="{{ auth()->user()->role === 'mitra' ? route('mitra.dashboard') : route('customer.dashboard') }}" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 hover:bg-slate-200 transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <h1 class="text-lg font-bold text-slate-800">
                    Order #{{ $order->id }} - {{ ucfirst($order->service_type) }}
                </h1>
                <p class="text-xs text-slate-500 font-medium">
                    {{ auth()->user()->role === 'customer' ? 'Mitra: ' . ($order->mitra->name ?? 'Belum ada') : 'Customer: ' . $order->customer->name }}
                </p>
            </div>
        </div>
        <div class="px-3 py-1 rounded-full text-xs font-bold 
            {{ $order->status === 'in_progress' ? 'bg-blue-100 text-blue-600' : ($order->status === 'completed' ? 'bg-emerald-100 text-emerald-600' : 'bg-slate-100 text-slate-600') }}">
            {{ strtoupper(str_replace('_', ' ', $order->status)) }}
        </div>
    </div>

    {{-- Chat Messages Area --}}
    <div id="chat-container" class="flex-1 overflow-y-auto p-6 space-y-6">
        @forelse($messages as $msg)
            @php
                $isMine = $msg->sender_id === auth()->id();
            @endphp
            <div class="flex {{ $isMine ? 'justify-end' : 'justify-start' }}">
                <div class="max-w-[75%] md:max-w-[60%] flex flex-col {{ $isMine ? 'items-end' : 'items-start' }}">
                    <span class="text-[10px] text-slate-400 font-semibold mb-1 px-1">
                        {{ $isMine ? 'Anda' : $msg->sender->name }} • {{ $msg->created_at->timezone('Asia/Jakarta')->format('H:i') }} WIB
                    </span>
                    
                    <div class="rounded-2xl px-5 py-3 shadow-sm relative group {{ $isMine ? 'bg-indigo-600 text-white rounded-tr-sm' : 'bg-white text-slate-700 border border-slate-200 rounded-tl-sm' }}">
                        
                        @if($msg->message)
                            <p class="text-sm leading-relaxed whitespace-pre-wrap">{{ $msg->message }}</p>
                        @endif

                        @if($msg->file_path)
                            <div class="{{ $msg->message ? 'mt-3 pt-3 border-t ' . ($isMine ? 'border-indigo-500/50' : 'border-slate-100') : '' }}">
                                <a href="{{ Storage::url($msg->file_path) }}" target="_blank" class="flex items-center gap-3 p-2 rounded-xl {{ $isMine ? 'bg-indigo-700/50 hover:bg-indigo-700' : 'bg-slate-50 hover:bg-slate-100' }} transition-colors">
                                    <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 {{ $isMine ? 'bg-indigo-500/50 text-indigo-200' : 'bg-slate-200 text-slate-500' }}">
                                        @if(preg_match('/\.(jpg|jpeg|png|gif)$/i', $msg->file_path))
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        @else
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        @endif
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="text-xs font-bold truncate {{ $isMine ? 'text-indigo-50' : 'text-slate-700' }}">{{ $msg->file_name }}</p>
                                        <p class="text-[10px] {{ $isMine ? 'text-indigo-300' : 'text-slate-400' }}">Klik untuk melihat/unduh</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="flex flex-col items-center justify-center h-full opacity-50">
                <div class="w-16 h-16 rounded-full bg-slate-200 flex items-center justify-center mb-4">
                    <span class="text-2xl">👋</span>
                </div>
                <p class="text-sm font-bold text-slate-500">Mulai Percakapan</p>
                <p class="text-xs text-slate-400 mt-1">Kirim pesan atau dokumen pertama Anda di sini.</p>
            </div>
        @endforelse
    </div>

    {{-- Input Area --}}
    <div class="bg-white border-t border-slate-200 p-4 md:p-6 sticky bottom-0 z-10">
        <form action="{{ route('chat.store', $order) }}" method="POST" enctype="multipart/form-data" class="max-w-4xl mx-auto flex items-end gap-3 relative" id="chat-form">
            @csrf
            
            {{-- File Input (Hidden) --}}
            <input type="file" name="file" id="file" class="hidden" onchange="updateFileName()">
            
            <button type="button" onclick="triggerFileSelect()" class="w-12 h-12 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 flex items-center justify-center flex-shrink-0 transition-colors" title="Attach File">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
            </button>

            <div class="flex-1 relative">
                @error('file')
                    <div class="absolute -top-16 left-0 bg-red-100 text-red-600 px-3 py-1.5 rounded-lg text-xs font-bold shadow-sm">
                        {{ $message }}
                    </div>
                @enderror
                @if(session('error'))
                    <div class="absolute -top-16 left-0 bg-red-100 text-red-600 px-3 py-1.5 rounded-lg text-xs font-bold shadow-sm">
                        {{ session('error') }}
                    </div>
                @endif
                {{-- File Preview Badge --}}
                <div id="file-preview" class="hidden absolute -top-10 left-0 bg-indigo-50 border border-indigo-100 text-indigo-600 px-3 py-1.5 rounded-lg text-xs font-bold items-center gap-2 shadow-sm">
                    <span id="file-name-text" class="truncate max-w-[200px]">document.pdf</span>
                    <button type="button" onclick="removeFile()" class="text-indigo-400 hover:text-indigo-600">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                
                <textarea name="message" id="message" rows="1" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all resize-none text-sm" placeholder="Ketik pesan Anda..."></textarea>
            </div>

            <button type="submit" class="w-12 h-12 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:opacity-90 text-white flex items-center justify-center flex-shrink-0 shadow-lg shadow-indigo-500/30 transition-all transform hover:scale-105" id="submit-btn">
                <svg class="w-5 h-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-scroll to bottom
    const chatContainer = document.getElementById('chat-container');
    chatContainer.scrollTop = chatContainer.scrollHeight;

    // File Preview Logic
    const fileInput = document.getElementById('file');
    const filePreview = document.getElementById('file-preview');
    const fileNameText = document.getElementById('file-name-text');

    function updateFileName() {
        if (fileInput.files.length > 0) {
            fileNameText.textContent = fileInput.files[0].name;
            filePreview.style.display = 'flex';
        } else {
            filePreview.style.display = 'none';
        }
    }

    function removeFile() {
        fileInput.value = '';
        filePreview.style.display = 'none';
    }

    // Auto-resize textarea
    const tx = document.getElementById('message');
    tx.setAttribute('style', 'height:' + (tx.scrollHeight) + 'px;overflow-y:hidden;');
    tx.addEventListener("input", OnInput, false);

    function OnInput() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
        if(this.value === '') {
            this.style.height = '50px';
        }
    }

    // Handle Enter to submit
    tx.addEventListener("keypress", function(event) {
        if (event.key === "Enter" && !event.shiftKey) {
            event.preventDefault();
            document.getElementById("submit-btn").click();
        }
    });

    // Simple Polling to refresh messages every 5 seconds
    let isSelectingFile = false;
    
    function triggerFileSelect() {
        isSelectingFile = true;
        document.getElementById('file').click();
    }

    window.addEventListener('focus', () => {
        if (isSelectingFile) {
            setTimeout(() => { isSelectingFile = false; }, 500);
        }
    });

    setInterval(() => {
        // Only refresh if user hasn't typed anything, no file is selected, document is visible, and not currently selecting a file
        if (tx.value.trim() === '' && fileInput.files.length === 0 && !isSelectingFile && document.visibilityState === 'visible') {
            location.reload();
        }
    }, 5000);
</script>
@endpush
