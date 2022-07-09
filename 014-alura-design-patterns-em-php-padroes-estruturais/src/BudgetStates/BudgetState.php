<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\BudgetStates;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Budget;

abstract class BudgetState
{
    abstract public function calculateExtraDiscount(Budget $budget): float;

    public function approve(Budget $budget): void
    {
        throw new \DomainException('This budget cannot be approved.');
    }

    public function reprove(Budget $budget): void
    {
        throw new \DomainException('This budget cannot be approved.');
    }

    public function finalize(Budget $budget): void
    {
        throw new \DomainException('This budget cannot be approved.');
    }
}