<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Taxes\Tax;

class TaxCalculator
{
    public function calculate(Budget $budget, Tax $tax): float
    {
        return $tax->calculateTax($budget);
    }
}
