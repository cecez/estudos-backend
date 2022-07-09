<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais;

abstract class Discount
{
    protected ?Discount $next;

    public function __construct(?Discount $next = null)
    {
        $this->next = $next;
    }

    abstract public function calculate(Budget $budget): float;
}