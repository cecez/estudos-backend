<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais;

use Exception;

class TaxCalculator
{
    /**
     * @throws Exception
     */
    public function calculate(Budget $budget, string $taxName): float
    {
        return match ($taxName) {
            "ICMS" => $budget->value * 0.1,
            "ISS" => $budget->value * 0.06,
            default => throw new Exception("Imposto não encontrado"),
        };
    }
}
