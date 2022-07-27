<?php

namespace Cezarcastrorosa\Curso017\Gamificacao\Aplicacao;

use Cezarcastrorosa\Curso017\Gamificacao\Dominio\Selo\RepositorioSelo;
use Cezarcastrorosa\Curso017\Gamificacao\Dominio\Selo\Selo;
use Cezarcastrorosa\Curso017\Shared\Dominio\Evento;
use Cezarcastrorosa\Curso017\Shared\Dominio\Eventos;
use Cezarcastrorosa\Curso017\Shared\Dominio\OuvinteDeEvento;

class GeraSeloNovato extends OuvinteDeEvento
{
    private RepositorioSelo $repositorioSelo;

    public function __construct(RepositorioSelo $repositorioSelo)
    {
        $this->repositorioSelo = $repositorioSelo;
    }

    public function sabeProcessar(Evento $evento): bool
    {
        return $evento->nome() === Eventos::AlunoMatriculado;
    }

    public function reageAo(Evento $evento): void
    {
        $dados = $evento->jsonSerialize();
        $cpf = $dados['cpf'];
        $selo = new Selo($cpf, "Novato");
        $this->repositorioSelo->adiciona($selo);
    }
}