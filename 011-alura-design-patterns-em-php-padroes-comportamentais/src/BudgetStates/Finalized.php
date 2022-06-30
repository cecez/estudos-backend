<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\BudgetStates;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Budget;

class Finalized extends BudgetState
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        throw new \DomainException('Finalized budgets cannot have a discount.');
    }
}
