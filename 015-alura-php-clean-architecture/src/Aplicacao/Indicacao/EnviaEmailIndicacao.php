<?php

namespace Cezarcastrorosa\Curso015\Aplicacao\Indicacao;

use Cezarcastrorosa\Curso015\Dominio\Aluno\Aluno;

interface EnviaEmailIndicacao
{
    public function enviaPara(Aluno $alunoIndicado): void;
}