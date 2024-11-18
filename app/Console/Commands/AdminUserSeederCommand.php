<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminUserSeederCommand extends Command
{
    protected $signature = 'admin:user-seeder {name} {email} {password}';

    protected $description = 'Command description';

    public function handle(): void
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        DB::table('users')->delete();

        DB::table('users')->insert([
            'id'              => 1,
            'name'            => $name,
            'email'           => $email,
            'password'        => bcrypt($password),
            //'api_token'       => Str::random(80),  //@todo
            'created_at'      => date('Y-m-d H:i:s'),
            'updated_at'      => date('Y-m-d H:i:s'),
            'status'          => 1,
            'role_id'         => 1,
            'view_permission' => 'global',
        ]);
    }
}
