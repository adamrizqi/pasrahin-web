<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Show the Mitra dashboard with pending and in-progress orders.
     */
    public function dashboard()
    {
        $pendingOrders = Order::where('status', 'pending')
            ->where('payment_status', 'paid')
            ->with('customer')
            ->latest()
            ->get();

        $myOrders = Order::where('mitra_id', auth()->id())
            ->whereIn('status', ['in_progress', 'completed', 'paid_to_mitra'])
            ->with('customer')
            ->latest()
            ->get();

        return view('mitra.dashboard', compact('pendingOrders', 'myOrders'));
    }

    /**
     * Accept a pending order (set status to in_progress, assign mitra).
     */
    public function accept(Order $order)
    {
        if ($order->status !== 'pending') {
            return redirect()->route('mitra.dashboard')->with('error', 'Pesanan sudah diambil Mitra lain.');
        }

        $order->update([
            'mitra_id' => auth()->id(),
            'status' => 'in_progress',
        ]);

        return redirect()->route('mitra.dashboard')->with('success', 'Pesanan berhasil diambil! Gas kerjain!');
    }

    /**
     * Mark an in_progress order as completed.
     */
    public function complete(Order $order)
    {
        if ($order->status !== 'in_progress' || $order->mitra_id !== auth()->id()) {
            return redirect()->route('mitra.dashboard')->with('error', 'Tidak bisa menyelesaikan pesanan ini.');
        }

        $order->update(['status' => 'completed']);

        return redirect()->route('mitra.dashboard')->with('success', 'Pesanan ditandai selesai! Menunggu konfirmasi dari Customer untuk pencairan saldo.');
    }

    public function settings()
    {
        return view('mitra.settings');
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $user->update($validated);

        return back()->with('success', 'Pengaturan bank berhasil diperbarui!');
    }

    public function orders()
    {
        $orders = Order::where('mitra_id', auth()->id())
            ->with('customer')
            ->latest()
            ->paginate(10);

        return view('mitra.orders', compact('orders'));
    }
}
