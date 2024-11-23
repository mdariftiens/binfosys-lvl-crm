<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SecondLayerConnection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->guard('user')->check()){

            $database = DB::table('databases')->whereId(auth()->guard('user')->user()->database_id)->first();

            config(['database.connections.dynamic' => [
                'driver' => $database->db_driver,
                'host' => $database->db_host,
                'port' => $database->db_port,
                'database' => $database->db_name,
                'username' => 'root', // $database->db_username,// @todo db username must be changed
                'password' => $database->db_password,
            ]]);
            DB::purge('dynamic');
            DB::reconnect('dynamic');

            DB::setDefaultConnection('dynamic');
        }
        return $next($request);
    }
}
