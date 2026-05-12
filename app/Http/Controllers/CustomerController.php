<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $orders = Order::where('customer_id', Auth::id())
            ->with('mitra')
            ->latest()
            ->get();

        return view('customer.dashboard', compact('orders'));
    }

    public function paymentSuccess(Order $order)
    {
        if ($order->customer_id !== Auth::id()) {
            abort(403);
        }

        $order->update(['payment_status' => 'paid']);

        return redirect()->route('customer.dashboard')->with('success', 'Pembayaran berhasil! Pesanan Anda siap dikerjakan.');
    }

    public function cancelOrder(Order $order)
    {
        if ($order->customer_id !== Auth::id()) {
            abort(403);
        }

        if ($order->status !== 'pending') {
            return back()->with('error', 'Pesanan yang sudah diproses tidak dapat dibatalkan.');
        }

        $order->delete();
        return back()->with('success', 'Pesanan berhasil dibatalkan.');
    }
}
