<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Taxes;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Budget;

class Iss implements Tax
{
    public function calculateTax(Budget $budget): float
    {
        return $budget->value * 0.06;
    }
}
