<?php

namespace Cezarcastrorosa\Curso015\Infra\Aluno;

use Cezarcastrorosa\Curso015\Dominio\Aluno\Aluno;
use Cezarcastrorosa\Curso015\Dominio\Aluno\CPF;
use Cezarcastrorosa\Curso015\Dominio\Aluno\RepositorioAluno;
use Exception;

class RepositorioAlunoMemoria implements RepositorioAluno
{
    private array $alunos = [];

    public function adicionar(Aluno $aluno): void
    {
        $this->alunos[] = $aluno;
    }

    /**
     * @throws Exception
     */
    public function buscaPorCPF(CPF $cpf): ?Aluno
    {
        $alunosFiltrados = array_filter(
            $this->alunos,
            fn (Aluno $aluno) => $cpf == $aluno->cpf()
        );

        if ($alunosFiltrados != 1) {
            throw new Exception("Aluno nao encontrado");
        }

        return $alunosFiltrados[0];
    }
}
