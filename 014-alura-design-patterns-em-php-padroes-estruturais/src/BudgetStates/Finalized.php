<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\BudgetStates;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Budget;

class Finalized extends BudgetState
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        throw new \DomainException('Finalized budgets cannot have a discount.');
    }
}
