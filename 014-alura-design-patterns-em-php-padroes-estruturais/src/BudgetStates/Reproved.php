<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\BudgetStates;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Budget;

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
