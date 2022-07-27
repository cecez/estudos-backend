<?php

namespace Cezarcastrorosa\Tests\Curso017\Academico\Dominio\Aluno;

use Cezarcastrorosa\Curso017\Academico\Dominio\Aluno\AlunoNaoPodeTerMaisDeDoisTelefones;
use Cezarcastrorosa\Curso017\Academico\Dominio\Aluno\Aluno;
use PHPUnit\Framework\TestCase;

class AlunoTest extends TestCase
{
    /** @test */
    public function alunoNaoPodeTerMaisDeDoisTelefones()
    {
        $this->expectException(AlunoNaoPodeTerMaisDeDoisTelefones::class);
        $aluno = Aluno::comCPFEmailENome("012.020.020-11", "email@email.com", "Nominho");
        $aluno->adicionaTelefone("11", "11111111");
        $aluno->adicionaTelefone("11", "11111111");
        $aluno->adicionaTelefone("11", "11111111");
    }

    /** @test */
    public function alunoPodeTerAteDoisTelefones()
    {
        $aluno = Aluno::comCPFEmailENome("111.111.111-11", "email@email.com", "Nominho");
        $aluno->adicionaTelefone("11", "11111111");
        $aluno->adicionaTelefone("11", "11111111");
        $this->assertCount(2, $aluno->telefones());
    }
}