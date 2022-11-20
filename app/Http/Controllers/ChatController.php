<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Chat $chat)
    {
        abort_unless($chat->users->contains(auth()->id()), 403);
        return view('theme.frontoffice.pages.chat.show', [
                'chat' => $chat
        ]);
    }
    public function chat_with(User $user)
    {
        $user_a = auth()->user();
        $user_b = $user;
        $chat = $user_a->chats()->wherehas('users', function ($q) use ($user_b) {
            $q->where('chat_user.user_id', $user_b->id);
        })->first();
        if(!$chat)
        {
            try {
                $chat = \App\Models\Chat::create([]);
                $chat->users()->sync([$user_a->id, $user_b->id]);
            }catch (\Exception $exception){
                return $exception;
            }
        }

        return redirect()->route('frontoffice.dashboard.index', $chat);
    }
    public function get_users(Chat $chat)
    {
        $users = $chat->users;
        return response()->json([
            'users' => $users
        ]);
    }

    public function get_messages(Chat $chat)
    {
        $messages = $chat->messages()->with('user')->get();
        return response()->json([
            'messages' => $messages
        ]);
    }

}
