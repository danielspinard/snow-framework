<?php

namespace Snow;

use PDO;

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
    private $options;

    /**
     * @var PDO
     */
    private $instace;

    /**
     * @param string $driver
     * @param string $host
     * @param string $port
     * @param string $name
     * @param string $username
     * @param string $password
     */
    public static function define(
        string $driver, string $host, string $port, string $name, string $username, string $password
    ){
        define("DATA_LAYER_CONFIG", [
            "driver" => $driver,
            "host" => $host,
            "port" => $port,
            "dbname" => $name,
            "username" => $username,
            "passwd" => $password,
            "options" => [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ]
        ]);
    }
}
