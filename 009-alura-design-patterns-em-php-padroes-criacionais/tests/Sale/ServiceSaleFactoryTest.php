<?php

namespace Tests\Sale;

use Alura\DesignPattern\Impostos\Iss;
use Alura\DesignPattern\Sale\ServiceSale;
use Alura\DesignPattern\Sale\ServiceSaleFactory;
use PHPUnit\Framework\TestCase;

class ServiceSaleFactoryTest extends TestCase
{
    public function testShouldReturnServiceSale()
    {
        $serviceSaleFactory = new ServiceSaleFactory('Cezar Rosa');
        $serviceSale = $serviceSaleFactory->createSale();
        $taxServiceSale = $serviceSaleFactory->tax();

        $this->assertInstanceOf(ServiceSale::class, $serviceSale);
        $this->assertInstanceOf(Iss::class, $taxServiceSale);
    }
}
