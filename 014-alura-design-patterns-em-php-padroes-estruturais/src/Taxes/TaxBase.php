<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Taxes;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Budget;

abstract class TaxBase implements Tax
{
    public function calculateTax(Budget $budget): float
    {
        if ($this->shouldApplyTax($budget)) {
            return $this->applyTax($budget);
        }

        return $this->applyOtherTaxes($budget);
    }

    abstract protected function shouldApplyTax(Budget $budget): bool;
    abstract protected function applyTax(Budget $budget): float;
    abstract protected function applyOtherTaxes(Budget $budget): float;
}
