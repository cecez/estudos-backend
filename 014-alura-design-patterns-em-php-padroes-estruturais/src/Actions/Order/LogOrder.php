<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Actions\Order;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Order;

class LogOrder implements OrderAction
{
    public function execute(Order $order): void
    {
        echo "Logging order: {$order}.";
    }
}