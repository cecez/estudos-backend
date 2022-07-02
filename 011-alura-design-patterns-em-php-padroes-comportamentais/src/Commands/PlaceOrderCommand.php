<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Commands;

class PlaceOrderCommand
{
    public function __construct(
        private float $budgetValue,
        private int $itensNumber,
        private string $clientName
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
