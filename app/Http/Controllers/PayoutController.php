<?php

namespace App\Http\Controllers;

use App\Models\Payout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayoutController extends Controller
{
    public function requestPayout(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:10000',
            'bank_name' => 'required|string',
            'account_number' => 'required|string',
        ]);

        $mitra = auth()->user();

        if ($mitra->balance < $validated['amount']) {
            return back()->with('error', 'Saldo tidak mencukupi untuk penarikan ini.');
        }

        // Deduct balance
        $mitra->balance -= $validated['amount'];
        $mitra->save();

        // Create payout request
        Payout::create([
            'mitra_id' => $mitra->id,
            'amount' => $validated['amount'],
            'bank_name' => $validated['bank_name'],
            'account_number' => $validated['account_number'],
            'status' => 'pending',
        ]);

        return back()->with('success', 'Permintaan pencairan dana berhasil dikirim! Menunggu konfirmasi admin.');
    }
}
