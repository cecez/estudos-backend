<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais;

class BudgetItem implements Budgetable
{
    public float $value;

    public function value(): float
    {
        return $this->value;
    }
}