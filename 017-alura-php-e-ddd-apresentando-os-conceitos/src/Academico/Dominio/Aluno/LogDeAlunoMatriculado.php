<?php

namespace Cezarcastrorosa\Curso017\Academico\Dominio\Aluno;

use Cezarcastrorosa\Curso017\Shared\Dominio\Evento;
use Cezarcastrorosa\Curso017\Shared\Dominio\Eventos;
use Cezarcastrorosa\Curso017\Shared\Dominio\OuvinteDeEvento;

class LogDeAlunoMatriculado extends OuvinteDeEvento
{
    public function reageAo(Evento $alunoMatriculado): void
    {
        fprintf(
            STDERR,
            "Aluno com CPF %s foi matriculado em %s",
            $alunoMatriculado->cpfAluno(),
            $alunoMatriculado->momento()->format("d/m/Y H:i")
        );
    }

    public function sabeProcessar(Evento $evento): bool
    {
        return $evento->nome() === Eventos::AlunoMatriculado;
    }
}