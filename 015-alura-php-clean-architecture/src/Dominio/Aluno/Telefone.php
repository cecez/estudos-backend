<?php

namespace Cezarcastrorosa\Curso015\Dominio\Aluno;

use Stringable;

class Telefone implements Stringable
{
    private string $ddd;
    private string $numero;

    public function __construct(string $ddd, string $numero)
    {
        if (!$this->dddValido($ddd)) {
            throw new \InvalidArgumentException("DDD de telefone inválido.");
        }
        if (!$this->numeroValido($numero)) {
            throw new \InvalidArgumentException("Número de telefone inválido.");
        }
        $this->ddd = $ddd;
        $this->numero = $numero;
    }

    private function dddValido(string $ddd): bool
    {
        $opcoes = [
            'options' => [
                'regexp' => '/\d{2}/'
            ]
        ];
        return !(filter_var($ddd, FILTER_VALIDATE_REGEXP, $opcoes) === false);
    }

    private function numeroValido(string $numero): bool
    {
        $opcoes = [
            'options' => [
                'regexp' => '/^\d{8,9}$/'
            ]
        ];
        return !(filter_var($numero, FILTER_VALIDATE_REGEXP, $opcoes) === false);
    }

    public function __toString(): string
    {
        return "({$this->ddd}) {$this->numero}";
    }

    public function ddd(): string
    {
        return $this->ddd;
    }

    public function numero(): string
    {
        return $this->numero;
    }
}
