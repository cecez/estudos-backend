<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais;

class MoreThan5Itens extends Discount
{
    public function calculate(Budget $budget): float
    {
        if ($budget->amountOfItems > 5) {
            return $budget->value * 0.1;
        }
        return $this->next->calculate($budget);
    }
}