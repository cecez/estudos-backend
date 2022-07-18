<?php

namespace Cezarcastrorosa\Curso015\Dominio\Aluno;

interface RepositorioAluno
{
    public function adicionar(Aluno $aluno): void;

    public function buscaPorCPF(CPF $cpf): ?Aluno;
}