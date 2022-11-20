<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Role;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'users_chat' => $users_chat
        ]);
    }
}
