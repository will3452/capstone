<?php

namespace App\Http\Controllers;

use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        if (empty(request()->latest)) {
            return redirect('/messages?latest=1#latest');
        }
        $messages = Message::where('receiver_id', auth()->id())->orWhere('sender_id', auth()->id())->get();

        return view('messages', compact('messages'));
    }

    public function send()
    {
        $data = request()->validate([
            'body' => 'required',
        ]);

        Message::create([
            'body' => $data['body'],
            'receiver_id' => 1,
        ]);

        alert('message sent!');
        return redirect('/messages?latest=1#latest');
    }
}
