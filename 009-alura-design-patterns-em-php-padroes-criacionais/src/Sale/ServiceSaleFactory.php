<?php

namespace Alura\DesignPattern\Sale;

use Alura\DesignPattern\Impostos\Imposto;
use Alura\DesignPattern\Impostos\Iss;

class ServiceSaleFactory implements SaleFactory
{

    private string $serviceProvider;

    public function __construct(string $serviceProvider)
    {
        $this->serviceProvider = $serviceProvider;
    }

    public function createSale(): Sale
    {
        return new ServiceSale(new \DateTimeImmutable(), $this->serviceProvider);
    }

    public function tax(): Imposto
    {
        return new Iss();
    }
}