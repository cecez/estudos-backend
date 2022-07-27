<?php

namespace Cezarcastrorosa\Tests\Curso017\Academico\Dominio\Aluno;

use Cezarcastrorosa\Curso017\Academico\Dominio\Aluno\Telefone;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class TelefoneTest extends TestCase
{
    public function testDDDInvalido()
    {
        $this->expectException(InvalidArgumentException::class);
        new Telefone("1", "123123123");
    }

    public function testDDDValido()
    {
        $telefone = new Telefone("11", "123123123");
        $this->assertEquals("(11) 123123123", $telefone);
    }

    public function testNumeroInvalido()
    {
        $this->expectException(InvalidArgumentException::class);
        new Telefone("12", "123123123123");
    }

    public function testNumeroValido()
    {
        $telefone = new Telefone("12", "12312312");
        $this->assertEquals("(12) 12312312", $telefone);
    }
}