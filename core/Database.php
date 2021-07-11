<?php

namespace Snow;


use PDO;
use Exception;
use Illuminate\Database\Capsule\Manager;

class Database
{
    /**
     * @param bool $connect
     * @return void
     */
    public function __construct(bool $connect = true)
    {
        if (!$connect) {
            return;
        }

        $this->up(new Manager());
    }

    /**
     * @return void
     */
    private function up(Manager $manager): void
    {
        $manager->setAsGlobal();
        $manager->bootEloquent();
        $manager->addConnection([
            'driver' => env('DB_DRIVER', 'mysql'),
            'host' => env('DB_HOST', '127.0.0.1') . ':' . env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'test'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', 'root'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
    }
}
