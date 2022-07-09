<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Commands;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Actions\Order\OrderAction;
use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Budget;
use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Order;

class PlaceOrderHandler
{
    /** @var OrderAction[] */
    private array $observers;

    public function __construct(
        /* Repositories, MailService, etc */
    ) {
    }

    public function addObserver(OrderAction $action): void
    {
        $this->observers[] = $action;
    }

    public function execute(PlaceOrderCommand $placeOrderCommand): void
    {
        $budget = new Budget();
        $budget->amountOfItems = $placeOrderCommand->getItensNumber();
        $budget->value = $placeOrderCommand->getBudgetValue();

        $order = new Order($budget, $placeOrderCommand->getClientName(), new \DateTimeImmutable());

        foreach ($this->observers as $observer) {
            $observer->execute($order);
        }

        // repository use
        // mailservice use
        // etc
    }
}
