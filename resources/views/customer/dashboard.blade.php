@extends('layouts.app')

@section('title', 'Riwayat Pesanan - Pasrahin')

@section('content')
<div class="p-8 md:p-12 lg:p-16 flex-1 max-w-7xl mx-auto w-full">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-white mb-2 tracking-tight">Riwayat Pesanan</h1>
        <p class="text-sm text-slate-400">Pantau status pesanan dan lakukan pembayaran di sini.</p>
    </div>

    @if($orders->isEmpty())
        <div class="bg-[#1e293b] border border-slate-700/60 rounded-3xl p-12 text-center">
            <div class="w-16 h-16 rounded-full bg-slate-800 flex items-center justify-center mx-auto mb-4">
                <span class="text-2xl">📋</span>
            </div>
            <h3 class="text-lg font-bold text-white mb-2">Belum ada pesanan</h3>
            <p class="text-sm text-slate-400 mb-6">Kamu belum pernah memesan layanan apapun.</p>
            <a href="/" class="inline-block px-6 py-3 bg-indigo-500 hover:bg-indigo-400 text-white font-semibold rounded-xl shadow-[0_0_15px_rgba(99,102,241,0.3)] transition-all">
                Pesan Sekarang
            </a>
        </div>
    @else
        <div class="grid gap-6">
            @foreach($orders as $order)
                <div class="bg-[#1e293b] border border-slate-700/60 rounded-3xl p-6 flex flex-col md:flex-row gap-6 items-start md:items-center">
                    {{-- Status Badge & Chat --}}
                    <div class="flex-shrink-0 w-full md:w-auto flex flex-col items-start gap-3">
                        <div class="flex gap-2 w-full justify-between md:justify-start">
                            @if($order->status === 'pending')
                                <span class="px-4 py-1.5 rounded-lg bg-amber-500/10 text-amber-400 border border-amber-500/20 text-xs font-bold uppercase tracking-wider">Menunggu Mitra</span>
                            @elseif($order->status === 'in_progress')
                                <span class="px-4 py-1.5 rounded-lg bg-blue-500/10 text-blue-400 border border-blue-500/20 text-xs font-bold uppercase tracking-wider">Sedang Dikerjakan</span>
                            @elseif($order->status === 'completed')
                                <span class="px-4 py-1.5 rounded-lg bg-amber-500/10 text-amber-400 border border-amber-500/20 text-xs font-bold uppercase tracking-wider">Perlu Konfirmasi</span>
                            @elseif($order->status === 'paid_to_mitra')
                                <span class="px-4 py-1.5 rounded-lg bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-xs font-bold uppercase tracking-wider">Selesai</span>
                            @endif

                            @if($order->payment_status === 'unpaid')
                                <span class="px-4 py-1.5 rounded-lg bg-red-500/10 text-red-400 border border-red-500/20 text-xs font-bold uppercase tracking-wider">Belum Bayar</span>
                            @else
                                <span class="px-4 py-1.5 rounded-lg bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-xs font-bold uppercase tracking-wider">Sudah Bayar</span>
                            @endif
                        </div>
                        
                        @if($order->status === 'in_progress' || $order->status === 'completed')
                            <div class="flex flex-col gap-2 w-full">
                                <a href="{{ route('chat.index', $order) }}" class="w-full flex items-center justify-center gap-2 px-4 py-2 mt-1 bg-indigo-500/20 hover:bg-indigo-500/30 text-indigo-300 border border-indigo-500/50 rounded-lg text-xs font-bold transition-colors">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                    Buka Chat
                                </a>

                                @if($order->status === 'completed')
                                    <form action="{{ route('customer.orders.confirm', $order) }}" method="POST" class="w-full">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-emerald-500 hover:bg-emerald-400 text-white rounded-lg text-xs font-extrabold transition-all shadow-[0_0_15px_rgba(16,185,129,0.3)]">
                                            Konfirmasi Terima ✓
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endif
                    </div>

                    {{-- Order Info --}}
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-2xl">
                                @if(in_array($order->service_type, ['makanan', 'print', 'angkut']))
                                    {{ ['makanan' => '🍔', 'print' => '🖨️', 'angkut' => '📦'][$order->service_type] }}
                                @else
                                    ✨
                                @endif
                            </span>
                            <h3 class="text-lg font-bold text-white capitalize">
                                {{ $order->service_type === 'makanan' ? 'Jastip Makanan' : ($order->service_type === 'print' ? 'Print Tugas' : ($order->service_type === 'angkut' ? 'Angkut Barang' : $order->service_type)) }}
                            </h3>
                        </div>
                        <p class="text-sm text-slate-400 mb-4 line-clamp-2">{{ $order->details }}</p>
                        
                        <div class="flex flex-wrap gap-x-8 gap-y-2 text-[13px]">
                            <div>
                                <span class="text-slate-500 font-medium block mb-0.5">Jemput:</span>
                                <span class="text-slate-300">{{ $order->pickup_location }}</span>
                            </div>
                            <div>
                                <span class="text-slate-500 font-medium block mb-0.5">Antar:</span>
                                <span class="text-slate-300">{{ $order->dropoff_location }}</span>
                            </div>
                            <div>
                                <span class="text-slate-500 font-medium block mb-0.5">Mitra:</span>
                                <span class="text-slate-300 font-medium">{{ $order->mitra ? $order->mitra->name : 'Belum diambil' }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Action / Price --}}
                    <div class="flex-shrink-0 w-full md:w-48 bg-[#0f172a]/50 border border-slate-700/50 rounded-2xl p-4 text-center md:text-right">
                        <p class="text-xs text-slate-500 font-medium mb-1">Total Tagihan</p>
                        <p class="text-xl font-bold text-white mb-4">Rp {{ number_format($order->bid_price + $order->admin_fee, 0, ',', '.') }}</p>
                        
                        @if($order->payment_status === 'unpaid')
                            <button onclick="payMidtrans({{ $order->id }}, '{{ $order->snap_token }}')" class="w-full py-2.5 bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-400 hover:to-purple-400 text-white font-bold text-xs rounded-xl shadow-[0_0_15px_rgba(99,102,241,0.3)] transition-all">
                                Bayar Sekarang
                            </button>
                            <form id="success-form-{{ $order->id }}" action="{{ route('customer.payment.success', $order) }}" method="POST" class="hidden">
                                @csrf
                            </form>
                            @if($order->status === 'pending')
                                <form action="{{ route('customer.orders.cancel', $order) }}" method="POST" class="mt-2" onsubmit="return confirm('Yakin ingin membatalkan pesanan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full py-2 bg-slate-800 hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 border border-slate-700 hover:border-rose-500/30 font-bold text-xs rounded-xl transition-all">
                                        Batalkan
                                    </button>
                                </form>
                            @endif
                        @else
                            <button disabled class="w-full py-2.5 bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 font-bold text-xs rounded-xl cursor-not-allowed">
                                Lunas ✓
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script>
    function payMidtrans(orderId, snapToken) {
        if (!snapToken) {
            alert('Gagal memuat token pembayaran. Silakan hubungi admin.');
            return;
        }

        window.snap.pay(snapToken, {
            onSuccess: function(result){
                // Submit the hidden form to update status
                document.getElementById('success-form-' + orderId).submit();
            },
            onPending: function(result){
                alert("Menunggu pembayaran Anda!");
            },
            onError: function(result){
                alert("Pembayaran gagal!");
            },
            onClose: function(){
                console.log('Customer closed the popup without finishing the payment');
            }
        });
    }
</script>
@endpush
