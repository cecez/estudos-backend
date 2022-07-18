<?php

namespace Cezarcastrorosa\Curso015\Aplicacao\Aluno\MatricularAluno;

use Cezarcastrorosa\Curso015\Dominio\Aluno\Aluno;
use Cezarcastrorosa\Curso015\Dominio\Aluno\RepositorioAluno;

class MatricularAluno
{
    private RepositorioAluno $repositorioAluno;

    public function __construct(RepositorioAluno $repositorioAluno)
    {
        $this->repositorioAluno = $repositorioAluno;
    }

    public function executa(MatricularAlunoDTO $dados): void
    {
        $aluno = Aluno::comCPFEmailENome($dados->cpf, $dados->email, $dados->nome);
        $this->repositorioAluno->adicionar($aluno);
    }
}