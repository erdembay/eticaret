<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

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
            ->select('name', 'email', 'email_verified_at')
            ->get();
        $this->table(
            ['Name', 'Email'],
            $users
        );
        $userss = $this->withProgressBar(User::all(), function (User $user) {
            $this->info("{$user->name} - {$user->email}"); // info, comment, question, error, warn methods
            $this->newLine(2);
            $this->line("{$user->name} - {$user->email}");
            $this->newLine(2);
            $this->error("{$user->name} - {$user->email}");
            $this->newLine(2);
            $this->warn("{$user->name} - {$user->email}");
            $this->newLine(2);
        });
    }
}
