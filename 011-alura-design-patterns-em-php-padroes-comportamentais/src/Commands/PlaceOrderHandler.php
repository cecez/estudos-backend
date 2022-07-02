<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Commands;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Budget;
use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Order;

class PlaceOrderHandler
{
    public function __construct(
        /* Repositories, MailService, etc */
    ) {
    }

    public function execute(PlaceOrderCommand $placeOrderCommand): void
    {
        $budget = new Budget();
        $budget->amountOfItems = $placeOrderCommand->getItensNumber();
        $budget->value = $placeOrderCommand->getBudgetValue();

        $order = new Order($budget, $placeOrderCommand->getClientName(), new \DateTimeImmutable());

        // repository use
        // mailservice use
        // etc
    }
}
