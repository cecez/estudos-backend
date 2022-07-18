<?php

namespace Cezarcastrorosa\Curso015\Infra\Aluno;

use Cezarcastrorosa\Curso015\Dominio\Aluno\CifradorDeSenha;

class CifradorDeSenhaMd5 implements CifradorDeSenha
{
    public function cifra(string $senha): string
    {
        return md5($senha);
    }

    public function verifica(string $senhaEmTexto, string $senhaCifrada): bool
    {
        return $this->cifra($senhaEmTexto) === $senhaCifrada;
    }
}
