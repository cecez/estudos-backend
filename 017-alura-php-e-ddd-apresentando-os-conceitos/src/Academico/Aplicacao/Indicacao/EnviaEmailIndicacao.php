<?php

namespace Cezarcastrorosa\Curso017\Academico\Aplicacao\Indicacao;

use Cezarcastrorosa\Curso017\Academico\Dominio\Aluno\Aluno;

interface EnviaEmailIndicacao
{
    public function enviaPara(Aluno $alunoIndicado): void;
}