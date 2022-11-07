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
        $role= $request->role_id;
        $to = $request->input('email');
        $url_path = 'http://54.165.5.148/add-user-board/'.$role.'/'.$board->id.'/send';
        dd($url_path);
        $data = [
            'link' => $url_path,
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
