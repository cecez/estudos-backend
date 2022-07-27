<?php

namespace Cezarcastrorosa\Curso017\Academico\Dominio\Aluno;

class AlunoNaoPodeTerMaisDeDoisTelefones extends \DomainException
{
    public function __construct(string $mensagem)
    {
        parent::__construct($mensagem);
    }
}