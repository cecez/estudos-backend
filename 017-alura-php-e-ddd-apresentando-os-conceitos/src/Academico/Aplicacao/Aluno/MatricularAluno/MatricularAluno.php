<?php

namespace Cezarcastrorosa\Curso017\Academico\Aplicacao\Aluno\MatricularAluno;

use Cezarcastrorosa\Curso017\Academico\Dominio\Aluno\Aluno;
use Cezarcastrorosa\Curso017\Academico\Dominio\Aluno\AlunoMatriculado;
use Cezarcastrorosa\Curso017\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use Cezarcastrorosa\Curso017\Academico\Dominio\Aluno\PublicadorDeEvento;
use Cezarcastrorosa\Curso017\Academico\Dominio\Aluno\RepositorioAluno;

class MatricularAluno
{
    private RepositorioAluno $repositorioAluno;
    private PublicadorDeEvento $publicadorDeEvento;

    public function __construct(RepositorioAluno $repositorioAluno)
    {
        $this->repositorioAluno = $repositorioAluno;
        $this->publicadorDeEvento = new PublicadorDeEvento();
        $this->publicadorDeEvento->adicionarOuvinte(new LogDeAlunoMatriculado());
    }

    public function executa(MatricularAlunoDTO $dados): void
    {
        $aluno = Aluno::comCPFEmailENome($dados->cpf, $dados->email, $dados->nome);
        $this->repositorioAluno->adicionar($aluno);
        $this->publicadorDeEvento->publicar(new AlunoMatriculado($aluno->cpf()));
    }
}