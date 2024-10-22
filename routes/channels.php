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

Broadcast::channel('private-update-debuff.{id}', function ($user, $id) {
    // ID nya Akun SI
    return (int) $user->id === (int) $id;
//    return true;
});

Broadcast::channel('private-update-price.{id}', function ($user, $id) {
    // ID nya Akun SI
  return (int)$user->id === (int)$id;
    // return true;
});
