<?php

namespace Cezarcastrorosa\Curso017\Academico\Dominio\Aluno;

interface CifradorDeSenha
{
    public function cifra(string $senha): string;
    public function verifica(string $senhaEmTexto, string $senhaCifrada);
}