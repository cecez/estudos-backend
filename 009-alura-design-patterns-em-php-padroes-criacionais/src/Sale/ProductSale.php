<?php

namespace Alura\DesignPattern\Sale;

class ProductSale extends Sale
{
    private int $weight;

    public function __construct(\DateTimeInterface $date, int $weight)
    {
        parent::__construct($date);
        $this->weight = $weight;
    }
}