<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat-channel.{sender_id}', function (User $user, $sender_id)
{
    
    return (int) $user->id === (int) $sender_id;
    
});