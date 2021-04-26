<?php

namespace Snow;

use PDO;
use Exception;
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
     * @var array
     */
    private $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

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

        $this->driver();
        $this->define();
    }

    /**
     * @return void
     */
    private function driver(): void
    {
        $supported = [
            'mysql',
            'pgsql',
            'sqlite',
            'oci',
            'odbc',
            'sqlsrv',
            'cubrid',
            'dblib',
            'firebird',
            'ibm',
            'informix'
        ];

        if (!in_array($this->driver, $supported)) {
            throw new \PDOException('Driver PDO not supported, driver: ' . $this->driver);
        }
    }

    /**
     * @return void
     */
    private function define(): void
    {
        define('DATA_LAYER_CONFIG', [
            'driver' => $this->driver,
            'host' => $this->host,
            'port' => $this->port,
            'dbname' => $this->name,
            'username' => $this->username,
            'passwd' => $this->password,
            'options' => $this->options
        ]);
    }
}
