<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Report;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Budget;
use JetBrains\PhpStorm\ArrayShape;

class BudgetContent implements Content
{
    private Budget $budget;

    public function __construct(Budget $budget)
    {
        $this->budget = $budget;
    }

    #[ArrayShape(['value' => "float", 'amountOfItens' => "int"])]
    public function content(): array
    {
        return [
            'value' => $this->budget->value,
            'amountOfItens' => $this->budget->amountOfItems
        ];
    }
}