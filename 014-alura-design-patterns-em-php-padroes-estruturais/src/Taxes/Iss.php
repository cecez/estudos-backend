<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Taxes;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Budget;

class Iss implements Tax
{
    public function calculateTax(Budget $budget): float
    {
        return $budget->value * 0.06;
    }
}
