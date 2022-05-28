<?php

namespace Tests\DB;

use Alura\DesignPattern\DB\PDOConnection;
use PHPUnit\Framework\TestCase;

class PDOConnectionTest extends TestCase
{
    /**
     * @covers \Alura\DesignPattern\DB\PDOConnection::getInstance
     */
    public function test_it_gets_the_same_object()
    {
        $pdoConnection = PDOConnection::getInstance();
        $anotherPdoConnection = PDOConnection::getInstance();

        self::assertEquals($pdoConnection, $anotherPdoConnection);
    }

}
