<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais;

class Order
{
    public function __construct(
        private Budget $budget,
        private string $clientName,
        private \DateTimeInterface $date
    ) {
    }
}
