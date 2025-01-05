<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use App\Notifications\UserWelcomeMailNotification;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $token = Str::random(40); // * 40 karakterlik rastgele bir token oluşturduk.
        Cache::put('activation_token_'. $token, $user->id, 3600); // * 1 saat boyunca tokeni sakladık.
        $user->notify(new UserWelcomeMailNotification($token)); // * UserWelcomeNotification notificationını gönderdik.
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        if($user->isDirty('email')) { // * Eğer email alanı değiştiyse
            $user->email_verified_at = null; // * email_verified_at alanını null yap
            $user->save(); // * kaydet
        }
        else if($user->isDirty('email_verified_at')) { // * Eğer email_verified_at alanı değiştiyse
            Cache::forget('activation_token_'. request()->token); // * email_verified_at alanını cache'ten sil
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
