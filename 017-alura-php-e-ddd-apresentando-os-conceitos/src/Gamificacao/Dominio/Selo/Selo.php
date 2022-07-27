<?php

namespace Cezarcastrorosa\Curso017\Gamificacao\Dominio\Selo;

use Cezarcastrorosa\Curso017\Academico\Dominio\Aluno\CPF;

class Selo
{
    private CPF $cpf;
    private string $nome;

    public function __construct(CPF $cpf, string $nome)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
    }

    public function cpf(): string
    {
        return $this->cpf;
    }
}
