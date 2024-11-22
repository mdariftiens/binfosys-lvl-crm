<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class runMigrationAndSeedCommand extends Command
{
    protected $signature = 'run:migration-and-seed
                        {DB_HOST}
                        {DB_PORT}
                        {DB_DATABASE}
                        {DB_USERNAME}
                        {DB_PASSWORD}
                        {email}
                        {password}';

    protected $description = 'Command description';

    public function handle(): void
    {

        $dbHost = $this->argument('DB_HOST');
        $dbPort = $this->argument('DB_PORT');
        $dbDatabase = $this->argument('DB_DATABASE');
        $dbUsername = $this->argument('DB_USERNAME');
        $dbPassword = ($this->argument('DB_PASSWORD') == 'ttt') ? '' : '';

        $email = $this->argument('email');
        $password = $this->argument('password');
        $name = 'abc';

        Config::set('database.connections.dynamic', [
            'driver' => 'mysql',
            'host' => $dbHost,
            'port' => $dbPort,
            'database' => $dbDatabase,
            'username' => $dbUsername,
            'password' => $dbPassword,
        ]);

        DB::purge('dynamic');
        DB::reconnect('dynamic');
        DB::setDefaultConnection('dynamic');

        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        Artisan::call("admin:user-seeder {$name} {$email} {$password}");
    }
}
