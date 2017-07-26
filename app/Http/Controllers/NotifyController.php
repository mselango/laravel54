<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\InvoicePaid;
use App\Models\User;
use App\Notifications\sendScore;

class NotifyController extends Controller
{
    public function notifyMail()
    {
        $user = User::find(4);
        $user->notify(new InvoicePaid());

    }

    public function notifySms()
    {
        $user = User::find(4);
        $user->notify(new sendScore());
    }
}
