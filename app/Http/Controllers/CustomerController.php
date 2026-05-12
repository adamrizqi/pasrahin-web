<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function dashboard(Request $request)
    {
        $query = Order::where('customer_id', Auth::id())->with('mitra')->latest();

        $status = $request->query('status', 'all');

        if ($status === 'unpaid') {
            $query->where('payment_status', 'unpaid');
        } elseif ($status === 'active') {
            $query->whereIn('status', ['pending', 'in_progress', 'completed'])->where('payment_status', 'paid');
        } elseif ($status === 'completed') {
            $query->where('status', 'paid_to_mitra');
        }

        $orders = $query->get();

        return view('customer.dashboard', compact('orders', 'status'));
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

    public function confirmReceived(Order $order)
    {
        if ($order->customer_id !== Auth::id()) {
            abort(403);
        }

        if ($order->status !== 'completed') {
            return back()->with('error', 'Pesanan belum diselesaikan oleh Mitra.');
        }

        $order->update(['status' => 'paid_to_mitra']);

        // Add balance to Mitra
        $mitra = $order->mitra;
        if ($mitra) {
            $mitra->balance += $order->bid_price;
            $mitra->save();
        }

        return back()->with('success', 'Terima kasih! Pesanan telah selesai dan saldo telah diteruskan ke Mitra.');
    }
}
