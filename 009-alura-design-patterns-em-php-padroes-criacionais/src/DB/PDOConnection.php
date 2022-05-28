<?php

namespace Alura\DesignPattern\DB;

class PDOConnection extends \PDO
{
    private static ?PDOConnection $connection = null;

    private function __construct() {
        parent::__construct("sqlite::memory");
    }

    public static function getInstance(): PDOConnection {
        if (is_null(self::$connection)) {
            self::$connection = new self();
        }

        return self::$connection;
    }
}