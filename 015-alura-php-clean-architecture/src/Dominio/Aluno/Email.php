<?php

namespace Cezarcastrorosa\Curso015\Dominio\Aluno;

use InvalidArgumentException;

class Email implements \Stringable
{
    private string $endereco;

    public function __construct(string $endereco)
    {
        if (! filter_var($endereco, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Email inválido");
        }
        $this->endereco = $endereco;
    }

    public function __toString(): string
    {
        return $this->endereco;
    }
}
