<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Taxes\Tax;

class TaxCalculator
{
    public function calculate(Budget $budget, Tax $tax): float
    {
        return $tax->calculateTax($budget);
    }
}
