<?php

namespace Cezarcastrorosa\Curso017\Shared\Dominio;

class PublicadorDeEvento
{
    /** @var OuvinteDeEvento[] */
    private array $ouvintes = [];

    public function adicionarOuvinte(OuvinteDeEvento $ouvinteDeEvento): void
    {
        $this->ouvintes[] = $ouvinteDeEvento;
    }

    public function publicar(Evento $evento): void
    {
        foreach ($this->ouvintes as $ouvinte) {
            $ouvinte->processa($evento);
        }
    }
}