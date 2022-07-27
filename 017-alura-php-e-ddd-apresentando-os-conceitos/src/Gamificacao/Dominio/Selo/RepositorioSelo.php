<?php

namespace Cezarcastrorosa\Curso017\Gamificacao\Dominio\Selo;

use Cezarcastrorosa\Curso017\Academico\Dominio\Aluno\CPF;

interface RepositorioSelo
{
    public function adiciona(Selo $selo): void;
    public function selosDeAlunoComCpf(CPF $Cpf): array;
}
