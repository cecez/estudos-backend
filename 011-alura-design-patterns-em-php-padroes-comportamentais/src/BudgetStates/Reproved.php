<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\BudgetStates;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Budget;

class Reproved extends BudgetState
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        throw new \DomainException('Reproved budgets cannot have a discount.');
    }

    public function finalize(Budget $budget): void
    {
        $budget->state = new Finalized();
    }
}
