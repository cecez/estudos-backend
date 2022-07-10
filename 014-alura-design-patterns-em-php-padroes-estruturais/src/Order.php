<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais;

class Order
{
    public function __construct(
        private Budget $budget,
        private readonly string $clientName,
        private \DateTimeInterface $date
    ) {
    }

    public function __toString(): string
    {
        return "Client name: {$this->clientName}";
    }

    public function clientName(): string
    {
        return $this->clientName;
    }
}
