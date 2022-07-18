<?php

namespace Cezarcastrorosa\Curso015\Dominio\Aluno;

interface CifradorDeSenha
{
    public function cifra(string $senha): string;
    public function verifica(string $senhaEmTexto, string $senhaCifrada);
}