<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Database Backup Monthly';

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
        /* if (exec('mysqldump -h localhost -u root ginumerik-database > storage/app/DB/ginumerik-database.sql')) {
            \Log::info("Backup success");
        } else {
            exec('mysqldump -h localhost -u root ginumerik-database > storage/app/DB/ginumerik-database.sql');
            \Log::info("Backup failed");
        } */

        // $sql_name = date('m_Y').'_'.env('DB_DATABASE', 'laravel').'_'.rand(999, 9999999); 
        // $process  = new Process(['mysqldump -h '.env('DB_HOST', 'localhost').' -u '.env('DB_USERNAME', 'root').' -p '.env('DB_PASSWORD', '').' '.env('DB_DATABASE', 'laravel').' > storage/app/DB/'.$sql_name.'.sql']);
        // $process->run();

        $process = new Process(['mysqldump', 'ginumerik-database -h localhost -u root ']);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        \Log::info($process->getOutput());
    }
}
