<?php

namespace Cezarcastrorosa\Tests\Curso015\Dominio\Aluno;

use Cezarcastrorosa\Curso015\Dominio\Aluno\CPF;
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