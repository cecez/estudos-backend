<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais;

use Exception;

class BudgetCacheProxy extends Budget
{
    private ?float $cachedValue;
    private Budget $budget;

    public function __construct(Budget $budget)
    {
        parent::__construct();
        $this->cachedValue = null;
        $this->budget = $budget;
    }

    /**
     * @throws Exception
     */
    public function addItem(Budgetable $budgetItem): void
    {
        throw new Exception("Cannot add itens to proxy cache.");
    }

    public function value(): float
    {
        if (is_null($this->cachedValue)) {
            $this->cachedValue = $this->budget->value();
        }

        return $this->cachedValue;
    }
}