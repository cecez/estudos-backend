<?php

namespace Cezarcastrorosa\Tests\Curso017\Academico\Dominio\Aluno;

use Cezarcastrorosa\Curso017\Academico\Dominio\Aluno\Email;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailInvalido()
    {
        $this->expectException(InvalidArgumentException::class);
        new Email("endereco@naoemail");
    }

    public function testEmailValido()
    {
        $email = new Email("email@email.com");
        $this->assertEquals("email@email.com", $email);
    }
}
