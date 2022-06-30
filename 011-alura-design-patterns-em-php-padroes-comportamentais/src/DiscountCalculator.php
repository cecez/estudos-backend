<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais;

class DiscountCalculator
{
    public function calculate(Budget $budget): float
    {
        $chain =
            new MoreThan5Itens(
                new MoreThan500Reais(
                    new NoDiscount()
                )
            );

        return $chain->calculate($budget);
    }
}