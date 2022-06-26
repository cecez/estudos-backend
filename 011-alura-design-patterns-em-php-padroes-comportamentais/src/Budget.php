<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\BudgetStates\WaitingApproval;

class Budget
{
    public int $amountOfItems;
    public float $value;
    public BudgetStates\BudgetState $state;

    public function __construct()
    {
        $this->state = new WaitingApproval();
    }

    public function applyExtraDiscount(): void
    {
        $this->state->calculateExtraDiscount($this);
    }

    public function approve(): void
    {
        $this->state->approve($this);
    }

    public function reprove(): void
    {
        $this->state->reprove($this);
    }

    public function finalize(): void
    {
        $this->state->finalize($this);
    }
}
