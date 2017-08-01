<?php

namespace App\Listeners;

use App\Events\UserRegister;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use App\Mail\UserRegister as mailuserregister;
use Illuminate\Support\Facades\Mail;

class UserRegisterMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegister  $event
     * @return void
     */
    public function handle(UserRegister $event)
    {   
        $user = $event->user;
        Mail::to($user['email'])->queue(new mailuserregister($user));
    }
}
