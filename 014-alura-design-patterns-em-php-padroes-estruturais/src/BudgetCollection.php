<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais;

use Traversable;

class BudgetCollection implements \IteratorAggregate
{
    /** @var Budget[] */
    private array $budgets;

    public function __construct()
    {
        $this->budgets = [];
    }

    public function addBudget(Budget $budget): void
    {
        $this->budgets[] = $budget;
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->budgets);
    }
}
