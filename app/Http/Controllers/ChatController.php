<?php

namespace App\Http\Controllers;

use App\Events\UserChatEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;

class ChatController extends Controller
{
    public function chatWithUser(User $user){
        $authId = Auth::id();

        $messages = Message::where(function ($q) use ($authId, $user){
            $q->where('sender_id', $authId)->where('receiver_id', $user->id);
        })->orWhere(function ($q) use ($authId, $user){
            $q->where('sender_id', $user->id)->where('receiver_id', $authId);
        })->orderBy('created_at')->get();
        
       return view('chat.chat-page', compact('user', 'messages'));
    }


     public function sendMessage(Request $request){
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string'
        ]);
         if ($request->receiver_id == Auth::id()) {
                return response()->json(['error' => 'You cannot send message to yourself.'], 403);
            }
        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message
        ]);

        broadcast(new UserChatEvent($request->receiver_id, $request->message));

        return response()->json($message);
    }


    // chat list show section

    public function chatList() {
    $authId = Auth::id();

    // Find out the IDs of people you chatted with.

    $chatUserIds = Message::where('sender_id', $authId)
        ->orWhere('receiver_id', $authId)
        ->get()
        ->map(function($msg) use ($authId) {
            return $msg->sender_id == $authId ? $msg->receiver_id : $msg->sender_id;
        })
        ->unique()
        ->values();

    // Bring their details.
    $users = User::whereIn('id', $chatUserIds)->get();

    // Get everyone's latest message (optional)
    $lastMessages = [];
    foreach ($users as $user) {
        $lastMessage = \App\Models\Message::where(function($q) use ($authId, $user) {
            $q->where('sender_id', $authId)->where('receiver_id', $user->id);
        })->orWhere(function($q) use ($authId, $user) {
            $q->where('sender_id', $user->id)->where('receiver_id', $authId);
        })->latest()->first();

        $lastMessages[$user->id] = $lastMessage;
    }

    return view('chat.chat-list', compact('users', 'lastMessages'));
}

}
