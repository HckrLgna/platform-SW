<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Chat;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Chat $chat)
    {
        $user = auth()->user();
        $boards = $user->boards;
        $users_chat = [];
        foreach ($boards as $board){
            $users_chat = $board->users;
        }
        //abort_unless($chat->users->contains(auth()->id()), 403);
        return view('theme.frontoffice.pages.dashboard.show', [
            'chat' => $chat,
            'boards' => $boards,
            'users_chat' => $users_chat
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

        return redirect()->route('dashboard.show', $chat);
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
    public function index()
    {
        $user = auth()->user();
        $boards = $user->boards;
        $users_chat = [];
        foreach ($boards as $board){
            $users_chat = $board->users;
        }
        return view('theme.frontoffice.pages.dashboard.index',[
            'boards' => $boards,
            'users_chat' => $users_chat,
            'chats' => $user->chats->first
        ]);
    }
}
