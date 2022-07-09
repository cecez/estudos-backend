<?php

declare(strict_types=1);

namespace Cezarcastrorosa\Tests;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Budget;
use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\BudgetCollection;
use PHPUnit\Framework\TestCase;

final class BudgetCollectionTest extends TestCase
{
    public function testUnamedYet()
    {
        $budgetCollection = new BudgetCollection();
        $budget1 = new Budget();
        $budget1->value = 100;
        $budgetCollection->addBudget($budget1);
        $budget2 = new Budget();
        $budget2->value = 200;
        $budgetCollection->addBudget($budget2);
        $budget3 = new Budget();
        $budget3->value = 300;
        $budgetCollection->addBudget($budget3);
        $valuesExpected = [100, 200, 300];

        foreach ($budgetCollection as $key => $budget) {
            $this->assertInstanceOf(Budget::class, $budget);
            $this->assertEquals($valuesExpected[$key], $budget->value);
        }
    }
}
