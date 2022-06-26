<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\BudgetStates;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Budget;

class WaitingApproval extends BudgetState
{
    public function calculateExtraDiscount(Budget $budget): float
    {
        return $budget->value * 0.05;
    }

    public function approve(Budget $budget): void
    {
        $budget->state = new Approved();
    }

    public function reprove(Budget $budget): void
    {
        $budget->state = new Reproved();
    }
}
