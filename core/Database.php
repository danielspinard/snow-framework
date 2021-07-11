<?php

namespace Snow;


use PDO;
use Exception;
use Illuminate\Database\Capsule\Manager;
use function define;
use function in_array;

class Database
{
    /**
     * @var string
     */
    private $driver;

    /**
     * @var string
     */
    private $host;
    
    /**
     * @var string
     */
    private $port;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $username;

    /**
     * @param bool $connect
     * @return void
     */
    public function __construct(bool $connect = true)
    {
        if (!$connect) {
            return;
        }

        $this->driver = env('DB_DRIVER', 'mysql');
        $this->host = env('DB_HOST', '127.0.0.1');
        $this->port = env('DB_PORT', '3306');
        $this->name = env('DB_DATABASE', 'test');
        $this->username = env('DB_USERNAME', 'root');
        $this->password = env('DB_PASSWORD', 'root');

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
            'driver' => $this->driver,
            'host' => $this->host,
            'database' => $this->name,
            'username' => $this->username,
            'password' => $this->password,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
    }
}
