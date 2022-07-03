<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Commands;

class PlaceOrderCommand
{
    public function __construct(
        private readonly float $budgetValue,
        private readonly int $itensNumber,
        private readonly string $clientName
    ) {
    }

    /**
     * @return float
     */
    public function getBudgetValue(): float
    {
        return $this->budgetValue;
    }

    /**
     * @return int
     */
    public function getItensNumber(): int
    {
        return $this->itensNumber;
    }

    /**
     * @return string
     */
    public function getClientName(): string
    {
        return $this->clientName;
    }
}
