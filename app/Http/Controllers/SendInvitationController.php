<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendInvitationController extends Controller
{
    //
    public function store(Request $request){
        return $request;
    }
    public function enviar(Request $request){
        $data = [
            'link' => 'google.com',
            'role' => $request->input('role'),
            'board' => auth()->user(),
        ];
        $to = $request->input('email');

        Mail::send('theme.frontoffice.pages.emails.invitation',$data,function ($message) use ($to) {
            $message->from('platform@platform.com','Platform.net');
            $message->to($to)->subject('Invitation');
        });
        return redirect()->route('home');
    }
}
