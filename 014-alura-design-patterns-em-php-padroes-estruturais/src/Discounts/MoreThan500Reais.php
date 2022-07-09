<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais;

class MoreThan500Reais extends Discount
{
    public function calculate(Budget $budget): float
    {
        if ($budget->value > 500) {
            return $budget->value * 0.05;
        }
        return $this->next->calculate($budget);
    }
}