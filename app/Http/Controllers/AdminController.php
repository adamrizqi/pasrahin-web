<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payout;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $orders = Order::with(['customer', 'mitra'])->latest()->get();
        $payoutRequests = Payout::with('mitra')->latest()->get();

        $stats = [
            'total' => $orders->count(),
            'pending' => $orders->where('status', 'pending')->count(),
            'in_progress' => $orders->where('status', 'in_progress')->count(),
            'completed' => $orders->whereIn('status', ['completed', 'paid_to_mitra'])->count(),
        ];

        return view('admin.dashboard', compact('orders', 'payoutRequests', 'stats'));
    }

    public function completePayout(Payout $payout)
    {
        if ($payout->status !== 'pending') {
            return back()->with('error', 'Request pencairan ini sudah diproses.');
        }

        $payout->update(['status' => 'completed']);

        return back()->with('success', 'Pencairan dana berhasil ditandai selesai.');
    }

    public function orders()
    {
        $orders = Order::with(['customer', 'mitra'])->latest()->paginate(15);
        return view('admin.orders', compact('orders'));
    }

    public function deleteOrder(Order $order)
    {
        $order->delete();
        return back()->with('success', 'Pesanan berhasil dihapus.');
    }

    public function users()
    {
        $users = \App\Models\User::latest()->paginate(20);
        return view('admin.users', compact('users'));
    }

    public function updateUserRole(Request $request, \App\Models\User $user)
    {
        $validated = $request->validate([
            'role' => 'required|in:customer,mitra,admin',
        ]);

        $user->update(['role' => $validated['role']]);
        return back()->with('success', 'Role pengguna berhasil diperbarui.');
    }
}
