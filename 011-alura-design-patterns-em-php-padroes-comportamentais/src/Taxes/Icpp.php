<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Taxes;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Budget;

class Icpp extends TaxBase
{
    protected function shouldApplyTax(Budget $budget): bool
    {
        return $budget->value > 500;
    }

    protected function applyTax(Budget $budget): float
    {
        return $budget->value * 0.03;
    }

    protected function applyOtherTaxes(Budget $budget): float
    {
        return $budget->value * 0.025;
    }
}