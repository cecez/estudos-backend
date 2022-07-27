<?php

namespace Cezarcastrorosa\Tests\Curso017\Shared\Dominio;

use Cezarcastrorosa\Curso017\Shared\Dominio\CPF;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CPFTest extends TestCase
{
    public function testCPFInvalido()
    {
        $this->expectException(InvalidArgumentException::class);
        new CPF("0200202020-19");
    }

    public function testCPFValido()
    {
        $cpf = new CPF("012.020.899-11");
        $this->assertEquals("012.020.899-11", $cpf);
    }
}