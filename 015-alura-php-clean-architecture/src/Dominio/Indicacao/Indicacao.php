<?php

namespace Cezarcastrorosa\Curso015\Dominio\Indicacao;

use Cezarcastrorosa\Curso015\Dominio\Aluno\Aluno;
use DateTimeImmutable;
use DateTimeInterface;

class Indicacao
{
    private Aluno $indicador;
    private Aluno $indicado;
    private DateTimeInterface $data;

    public function __construct(Aluno $indicador, Aluno $indicado)
    {
        $this->indicador = $indicador;
        $this->indicado = $indicado;
        $this->data = new DateTimeImmutable();
    }
}
