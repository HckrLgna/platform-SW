<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('chat.{chat_id}', function ($user, $chat_id) {
    if ($user->chats->contains($chat_id)) {
        return $user;
    }
});
Broadcast::channel('board.{board_id}', function ($user, $board_id) {
    if ($user->boards->contains($board_id)) {
        return $user;
    }
});
