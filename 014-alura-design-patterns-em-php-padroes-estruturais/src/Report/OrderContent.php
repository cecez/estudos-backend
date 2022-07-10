<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Report;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Order;
use JetBrains\PhpStorm\ArrayShape;

class OrderContent implements Content
{
    private Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    #[ArrayShape(['client_name' => "string"])]
    public function content(): array
    {
        return [
            'client_name' => $this->order->clientName()
        ];
    }
}