<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Taxes;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Budget;

class Icms implements Tax
{
    public function calculateTax(Budget $budget): float
    {
        return $budget->value * 0.1;
    }
}
