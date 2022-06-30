<?php

namespace Tests\NotaFiscal;

use Alura\DesignPattern\ItemOrcamento;
use Alura\DesignPattern\NotaFiscal\NotaFiscalProdutoBuilder;
use Alura\DesignPattern\NotaFiscal\NotaFiscalServicoBuilder;
use PHPUnit\Framework\TestCase;

class NotaFiscalBuilderTest extends TestCase
{
    /**
     * @covers \Alura\DesignPattern\NotaFiscal\NotaFiscalBuilder::build
     */
    public function test_it_creates_a_correct_object()
    {
        $item1 = new ItemOrcamento();
        $item1->valor = 100;
        $item2 = new ItemOrcamento();
        $item2->valor = 200;

        $notaFiscal = (new NotaFiscalProdutoBuilder())
            ->comCnpj('12345678901234')
            ->comItem($item1)
            ->comItem($item2)
            ->comObservacoes('Observações')
            ->comRazaoSocial('Empresa')
            ->comDataDeEmissao(new \DateTime())
            ->build();

        self::assertEquals('12345678901234', $notaFiscal->getCNPJ());
    }

    /**
     * @covers \Alura\DesignPattern\NotaFiscal\NotaFiscalProdutoBuilder::build
     */
    public function test_tax_for_a_product_order()
    {
        $item1 = new ItemOrcamento();
        $item1->valor = 100;

        $notaFiscal = (new NotaFiscalProdutoBuilder())
            ->comItem($item1)
            ->build();

        self::assertEquals(100 * NotaFiscalProdutoBuilder::IMPOSTO_PRODUTO, $notaFiscal->getValorImposto());
    }

    /**
     * @covers \Alura\DesignPattern\NotaFiscal\NotaFiscalServicoBuilder::build
     */
    public function test_tax_for_a_service_order()
    {
        $item1 = new ItemOrcamento();
        $item1->valor = 100;

        $notaFiscal = (new NotaFiscalServicoBuilder())
            ->comItem($item1)
            ->build();

        self::assertEquals(100 * NotaFiscalServicoBuilder::IMPOSTO_SERVICO, $notaFiscal->getValorImposto());
    }

}
