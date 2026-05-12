<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Show the landing page with the order form.
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a new order from a customer.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_type' => 'required|string',
            'custom_service' => 'nullable|string|required_if:service_type,lainnya',
            'whatsapp_number' => 'required|string',
            'details' => 'required|string',
            'pickup_location' => 'required|string',
            'dropoff_location' => 'required|string',
            'bid_price' => 'required|numeric|min:1000',
        ]);

        $serviceType = $validated['service_type'] === 'lainnya' ? $validated['custom_service'] : $validated['service_type'];

        $order = Order::create([
            'customer_id' => auth()->id(),
            'service_type' => $serviceType,
            'whatsapp_number' => $validated['whatsapp_number'],
            'details' => $validated['details'],
            'pickup_location' => $validated['pickup_location'],
            'dropoff_location' => $validated['dropoff_location'],
            'bid_price' => $validated['bid_price'],
            'admin_fee' => 1000,
            'payment_status' => 'unpaid',
            'status' => 'pending',
        ]);

        // Set Midtrans Configuration
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        \Midtrans\Config::$curlOptions = [
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => []
        ]; // Fix for local SSL issues and Midtrans PHP 8 bug

        $params = array(
            'transaction_details' => array(
                'order_id' => 'ORD-' . $order->id . '-' . time(),
                'gross_amount' => (int) ($order->bid_price + $order->admin_fee),
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->name ?? 'Customer',
                'email' => auth()->user()->email,
                'phone' => $order->whatsapp_number,
            ),
        );

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $order->update(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            // Log error
            \Illuminate\Support\Facades\Log::error('Midtrans Error: ' . $e->getMessage());
            // If Midtrans fails, we still created the order but without snap_token
            return redirect()->route('customer.dashboard')->with('error', 'Pesanan dibuat, tapi gagal memuat pembayaran Midtrans. Error: ' . $e->getMessage());
        }

        return redirect()->route('customer.dashboard')->with('success', 'Pesanan berhasil dibuat! Segera lakukan pembayaran.');
    }
}
