<?php

namespace Cezarcastrorosa\Curso017\Academico\Dominio\Aluno;

interface RepositorioAluno
{
    public function adicionar(Aluno $aluno): void;

    public function buscaPorCPF(CPF $cpf): ?Aluno;
}