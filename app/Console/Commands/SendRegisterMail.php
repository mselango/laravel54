<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegister;
use App\Models\User;

class SendRegisterMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {--id=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $userId = $this->option('id');
        $user = User::find($userId);
        try {
            Mail::to($user->email)->send(new UserRegister($user));
        }
        catch (\Exception $e) {
            $this->warn("\n Error ".$e->getMessage()." \n File: ".$e->getFile()."\n Line No: ".$e->getLine()."\n");
        }
    }
}
