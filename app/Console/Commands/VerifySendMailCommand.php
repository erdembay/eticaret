<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use App\Notifications\UserWelcomeMailNotification;

class VerifySendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verify:send-mail {user? : User ID değeri alır} {--Q|queue} {--T|tc=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'E-posta doğrulama maili gönderir.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::query()
            ->whereNull('email_verified_at')
            ->select('name', 'email', 'email_verified_at')
            ->get();
        $this->table(
            ['Name', 'Email'],
            $users
        );
        foreach ($users as $user) {
            $this->info("{$user->name} - {$user->email}");
            $token = Str::random(40); // * 40 karakterlik rastgele bir token oluşturduk.
            Cache::put('activation_token_'. $token, $user->id, 3600); // * 1 saat boyunca tokeni sakladık.
            $user->notify(new UserWelcomeMailNotification($token)); // * UserWelcomeNotification notificationını gönderdik.
        }
        // $userss = $this->withProgressBar(User::all(), function (User $user) {
        //     $this->info("{$user->name} - {$user->email}"); // info, comment, question, error, warn methods
        //     $this->newLine(2);
        //     $this->line("{$user->name} - {$user->email}");
        //     $this->newLine(2);
        //     $this->error("{$user->name} - {$user->email}");
        //     $this->newLine(2);
        //     $this->warn("{$user->name} - {$user->email}");
        //     $this->newLine(2);
        // });
        Log::info("message");
    }
}
