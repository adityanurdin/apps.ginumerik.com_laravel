<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $debug = env('APP_DEBUG');
        if ($debug === TRUE) {
            $schedule->command('cron:lag')
                ->everyMinute()
                ->timezone('Asia/Jakarta');
        }elseif ($debug === FALSE) {
            $schedule->command('cron:lag')
                    ->hourly()
                    ->timezone('Asia/Jakarta');
        }

        // $schedule->command('cron:gitpull')
        //         // ->daily()
        //         ->everyMinute()
        //         ->timezone('Asia/Jakarta');

        // $schedule->command('backup:database')
        //         ->everyMinute()
        //         ->timezone('Asia/Jakarta');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
