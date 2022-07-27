<?php

namespace Cezarcastrorosa\Curso017\Academico\Dominio\Aluno;

use Cezarcastrorosa\Curso017\Shared\Dominio\CPF;
use Cezarcastrorosa\Curso017\Shared\Dominio\Evento;
use Cezarcastrorosa\Curso017\Shared\Dominio\Eventos;
use DateTimeImmutable;

class AlunoMatriculado implements Evento
{
    private \DateTimeImmutable $momento;
    private CPF $cpfAluno;

    public function __construct(CPF $cpfAluno)
    {
        $this->momento = new DateTimeImmutable();
        $this->cpfAluno = $cpfAluno;
    }

    public function cpfAluno(): CPF
    {
        return $this->cpfAluno;
    }

    public function momento(): DateTimeImmutable
    {
        return $this->momento;
    }

    public function nome(): Eventos
    {
        return Eventos::AlunoMatriculado;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
