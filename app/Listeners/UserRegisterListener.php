<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserRegisterEvent;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserWelcomeMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class UserRegisterListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegisterEvent $event): void
    {
        //
        $token = Str::random(40); // * 40 karakterlik rastgele bir token oluşturduk.
        Cache::put('activation_token_'. $token, $event->user->id, 900); // * 900 saniye boyunca tokeni sakladık.
        Mail::to($event->user->email)->send(new UserWelcomeMail($event->user, $token)); // * UserWelcomeMail mailini gönderdik.
    }
}
