<?php

namespace Cezarcastrorosa\Curso017\Gamificacao\Infra\Selo;

use Cezarcastrorosa\Curso017\Academico\Dominio\Aluno\CPF;
use Cezarcastrorosa\Curso017\Gamificacao\Dominio\Selo\RepositorioSelo;
use Cezarcastrorosa\Curso017\Gamificacao\Dominio\Selo\Selo;

class RepositorioSeloEmMemoria implements RepositorioSelo
{
    /** @var Selo[] */
    private array $selos = [];

    public function adiciona(Selo $selo): void
    {
        $this->selos[] = $selo;
    }

    public function selosDeAlunoComCpf(CPF $Cpf): array
    {
        return array_filter($this->selos, function (Selo $selo) use ($Cpf) {
            return $selo->cpf() == $Cpf;
        });
    }
}