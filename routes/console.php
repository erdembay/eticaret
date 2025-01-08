<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
Schedule::command('verify:send-mail')->daily();

/**
 * * Unix tabanlı işletim sistemlerinde zamanlanmış görevlerin çalıştırılabilmesi için kullanılan bir araç.
 * * Laravel, zamanlanmış görevlerinizi tanımlamak ve yönetmek için güzel bir API sağlar.
 * * cronjoblar crontab dosyasında tanımlanır. her cron job satırı beş zaman alanı ve ardından komutu içerir.
 *
 * * dakika (0 - 59)
 * * saat (0 - 23)
 * * gün (1 - 31)
 * * ay (1 - 12)
 * * hafta (0 - 7) (0 ve 7 Pazar günüdür)
 * * komut (çalıştırılacak komut)
 * *
 * * Örnek: 30 14 * * 2 /path/to/command
 * * Bu komut, her Salı günü saat 14:30 da çalıştırılacaktır.
 */
