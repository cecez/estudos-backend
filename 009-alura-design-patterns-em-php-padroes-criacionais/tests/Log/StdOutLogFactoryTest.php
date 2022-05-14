<?php

namespace Tests\Log;

use Alura\DesignPattern\Log\StdOutLogFactory;
use PHPUnit\Framework\TestCase;


class StdOutLogFactoryTest extends TestCase
{

    public function testStdOutLogWriter()
    {
        $logFactory = new StdOutLogFactory();
        $logFactory->log("ALERT", "This is a test");

        $this->expectOutputString("[".date('d/m/Y H:i:s')."][ALERT]: This is a test");
    }
}
