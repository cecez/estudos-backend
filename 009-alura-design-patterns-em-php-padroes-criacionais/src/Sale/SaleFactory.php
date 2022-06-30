<?php

namespace Alura\DesignPattern\Sale;

use Alura\DesignPattern\Impostos\Imposto;

interface SaleFactory
{
    public function createSale(): Sale;
    public function tax(): Imposto;
}