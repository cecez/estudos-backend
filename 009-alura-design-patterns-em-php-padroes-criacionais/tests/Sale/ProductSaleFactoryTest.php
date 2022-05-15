<?php

namespace Tests\Sale;

use Alura\DesignPattern\Impostos\Icms;
use Alura\DesignPattern\Sale\ProductSale;
use Alura\DesignPattern\Sale\ProductSaleFactory;
use PHPUnit\Framework\TestCase;

class ProductSaleFactoryTest extends TestCase
{
    public function testShouldCreateProductSale()
    {
        $productSaleFactory = new ProductSaleFactory(2000);
        $productSale = $productSaleFactory->createSale();
        $productTax = $productSaleFactory->tax();

        $this->assertInstanceOf(ProductSale::class, $productSale);
        $this->assertInstanceOf(Icms::class, $productTax);
    }
}
