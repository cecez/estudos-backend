<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Taxes;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Budget;

abstract class Tax
{
    private ?Tax $anotherTax;

    public function __construct(Tax $anotherTax = null)
    {
        $this->anotherTax = $anotherTax;
    }

    abstract protected function calculateTax(Budget $budget): float;

    public function calculate(Budget $budget)
    {
        return $this->calculateTax($budget) + $this->calculateAnotherTax($budget);
    }

    private function calculateAnotherTax(Budget $budget)
    {
        if (is_null($this->anotherTax)) {
            return 0;
        }

        return $this->anotherTax->calculate($budget);
    }
}
