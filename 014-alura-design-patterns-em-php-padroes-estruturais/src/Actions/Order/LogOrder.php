<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Actions\Order;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Order;

class LogOrder implements OrderAction
{
    public function execute(Order $order): void
    {
        echo "Logging order: {$order}.";
    }
}