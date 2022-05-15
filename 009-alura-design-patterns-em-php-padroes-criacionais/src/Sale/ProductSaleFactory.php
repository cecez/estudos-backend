<?php

namespace Alura\DesignPattern\Sale;

use Alura\DesignPattern\Impostos\Icms;
use Alura\DesignPattern\Impostos\Imposto;

class ProductSaleFactory implements SaleFactory
{
    private int $productWeight;

    public function __construct(int $productWeight)
    {
        $this->productWeight = $productWeight;
    }

    public function createSale(): Sale
    {
        return new ProductSale(new \DateTimeImmutable(), $this->productWeight);
    }

    public function tax(): Imposto
    {
        return new Icms();
    }
}