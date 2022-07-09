<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Taxes;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Budget;

interface Tax
{
    public function calculateTax(Budget $budget): float;
}
