<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\BudgetStates\WaitingApproval;

class Budget implements Budgetable
{
    public int $amountOfItems;
    public float $value;

    /** @var BudgetItem[] */
    private array $items;
    public BudgetStates\BudgetState $state;

    public function __construct()
    {
        $this->state = new WaitingApproval();
        $this->items = [];
    }

    public function applyExtraDiscount(): void
    {
        $this->state->calculateExtraDiscount($this);
    }

    public function approve(): void
    {
        $this->state->approve($this);
    }

    public function reprove(): void
    {
        $this->state->reprove($this);
    }

    public function finalize(): void
    {
        $this->state->finalize($this);
    }

    public function addItem(Budgetable $budgetItem): void
    {
        $this->items[] = $budgetItem;
    }

    public function value(): float
    {
        return array_reduce(
            $this->items,
            fn(float $acc, Budgetable $item) => $item->value() + $acc,
            0
        );
    }
}
