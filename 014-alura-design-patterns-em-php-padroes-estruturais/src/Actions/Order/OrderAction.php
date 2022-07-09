<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Actions\Order;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Order;

interface OrderAction
{
    public function execute(Order $order): void;
}
