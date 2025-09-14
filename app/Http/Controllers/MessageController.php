<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return response()->json(Message::with(['sender','receiver'])->latest()->get(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'sender_id'   => 'required|exists:users,id',
            'receiver_id' => 'required|exists:users,id',
            'content'     => 'required|string'
        ]);

        $message = Message::create($request->all());
        return response()->json($message, 201);
    }

    public function show($id)
    {
        return response()->json(Message::with(['sender','receiver'])->findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->update($request->all());
        return response()->json($message, 200);
    }

    public function destroy($id)
    {
        Message::destroy($id);
        return response()->json(null, 204);
    }
}
