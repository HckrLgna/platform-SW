<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendInvitationController extends Controller
{
    //
    public function store(Request $request){
        return $request;
    }
    public function enviar(Request $request, Board $board){
        $role= Role::find($request->role);
        $to = $request->input('email');
        $data = [
            'link' => 'http://54.165.5.148/add-user-board/'.$role.'/'.$board,
            'role' => $role,
            'board' => $board,
        ];
        Mail::send('theme.frontoffice.pages.emails.invitation',$data,function ($message) use ($to) {
            $message->from('platform@platform.com','Platform.net');
            $message->to($to)->subject('Invitation');
        });
        return redirect()->route('home');
    }
}
