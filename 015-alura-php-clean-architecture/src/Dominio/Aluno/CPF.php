<?php

namespace Cezarcastrorosa\Curso015\Dominio\Aluno;

use InvalidArgumentException;

class CPF implements \Stringable
{
    private string $numero;

    public function __construct(string $cpf)
    {
        if (! $this->isValido($cpf)) {
            throw new InvalidArgumentException("CPF inválido");
        }
        $this->numero = $cpf;
    }

    public function __toString(): string
    {
        return $this->numero;
    }

    private function isValido(string $cpf): bool
    {
        $opcoes = [
            'options' => [
                'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
            ]
        ];
        return !(filter_var($cpf, FILTER_VALIDATE_REGEXP, $opcoes) === false);
    }
}
