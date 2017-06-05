<?php

namespace Masha\Model;

class Connection
{
    /**
     * @var \PDO
     */
    private static $connection;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    /**
     * @return \PDO
     */
    public static function getConnection()
    {
        if (!static::$connection) {
            $config = require_once BP . 'configs/db.php';

            static::$connection = new \PDO(
                'mysql:host=localhost;dbname=webbylab',
                $config['user'],
                $config['password']
            );
        }
        return static::$connection;
    }
}
