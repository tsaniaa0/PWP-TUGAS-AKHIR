<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function startChat(Request $request)
    {
        $chat = Chat::create([
            'user_id' => Auth::id(),
            'topic' => $request->topic
        ]);

        Message::create([
            'chat_id' => $chat->id,
            'sender' => 'bot',
            'message' => 'Halo 🤍 Aku di sini untuk dengerin kamu. Cerita pelan-pelan ya.'
        ]);

        return redirect()->route('chat.view', $chat->id);
    }

    public function chat($id)
    {
        $chat = Chat::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $messages = $chat->messages;
        return view('chat', compact('chat', 'messages'));
    }

    public function sendMessage(Request $request)
    {
        $userMessage = strtolower($request->message);
        $length = strlen($userMessage);

        Message::create([
            'chat_id' => $request->chat_id,
            'sender' => 'user',
            'message' => $request->message
        ]);

        // LOGIKA CHATBOT
        if ($length > 250) {
            $botReply = "Terima kasih sudah cerita panjang lebar 🤍. Dari semua yang kamu ceritakan, bagian mana yang paling berat sekarang?";
        } elseif (str_contains($userMessage, 'stres')) {
            $botReply = "Aku paham kamu lagi stres 😔. Mau cerita penyebabnya?";
        } elseif (str_contains($userMessage, 'capek')) {
            $botReply = "Kedengarannya kamu capek banget. Kamu nggak sendirian 🌱";
        } else {
            $botReply = "Aku di sini dengerin kamu 😊";
        }

        Message::create([
            'chat_id' => $request->chat_id,
            'sender' => 'bot',
            'message' => $botReply
        ]);

        return redirect()->back();
    }
}
