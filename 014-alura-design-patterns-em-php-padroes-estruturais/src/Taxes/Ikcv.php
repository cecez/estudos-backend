<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Taxes;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Budget;

class Ikcv extends TaxBase
{
    protected function shouldApplyTax(Budget $budget): bool
    {
        return $budget->value > 300 && $budget->amountOfItems > 10;
    }

    protected function applyTax(Budget $budget): float
    {
        return $budget->value * 0.05;
    }

    protected function applyOtherTaxes(Budget $budget): float
    {
        return $budget->value * 0.02;
    }
}