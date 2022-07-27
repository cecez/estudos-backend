<?php

namespace Cezarcastrorosa\Curso017\Shared\Dominio;

use DateTimeImmutable;
use JsonSerializable;

interface Evento extends JsonSerializable
{
    public function momento(): DateTimeImmutable;
    public function nome(): Eventos;
}