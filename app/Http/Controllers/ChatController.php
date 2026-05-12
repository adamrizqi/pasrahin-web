<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    public function index(Order $order)
    {
        // Only customer and mitra of this order can access
        $user = Auth::user();
        if ($user->id !== $order->customer_id && $user->id !== $order->mitra_id) {
            abort(403, 'Unauthorized action.');
        }

        // Fetch messages
        $messages = $order->messages()->with('sender')->orderBy('created_at', 'asc')->get();

        return view('chat.index', compact('order', 'messages'));
    }

    public function store(Request $request, Order $order)
    {
        $user = Auth::user();
        if ($user->id !== $order->customer_id && $user->id !== $order->mitra_id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'message' => 'nullable|string',
            'file' => 'nullable|file|max:10240', // 10MB max
        ]);

        if (!$request->filled('message') && !$request->hasFile('file')) {
            return back()->with('error', 'Pesan tidak boleh kosong.');
        }

        $filePath = null;
        $fileName = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('chat_files', 'public');
        }

        Message::create([
            'order_id' => $order->id,
            'sender_id' => $user->id,
            'message' => $request->message,
            'file_path' => $filePath,
            'file_name' => $fileName,
        ]);

        return back();
    }
}
