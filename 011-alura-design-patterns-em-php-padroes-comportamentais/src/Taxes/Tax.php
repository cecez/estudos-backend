<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Taxes;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Budget;

interface Tax
{
    public function calculateTax(Budget $budget): float;
}
