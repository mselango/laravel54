<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\UserRegister;

use App\Models\User;

class EventController extends Controller
{

    public function triggerEvent()
    {
        $user = User::find(4);
        event(new UserRegister($user));
        
    }
}
