<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\BudgetStates;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Budget;

class Approved extends BudgetState
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        return $budget->value * 0.02;
    }

    public function finalize(Budget $budget): void
    {
        $budget->state = new Finalized();
    }
}
