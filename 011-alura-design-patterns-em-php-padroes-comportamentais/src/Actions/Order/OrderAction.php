<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Actions\Order;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesComportamentais\Order;

interface OrderAction
{
    public function execute(Order $order): void;
}
