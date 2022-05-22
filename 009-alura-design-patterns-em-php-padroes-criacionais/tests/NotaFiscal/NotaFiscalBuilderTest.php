<?php

namespace Tests\NotaFiscal;

use Alura\DesignPattern\ItemOrcamento;
use Alura\DesignPattern\NotaFiscal\NotaFiscalBuilder;
use PHPUnit\Framework\TestCase;

class NotaFiscalBuilderTest extends TestCase
{
    public function test_it_creates_a_correct_object()
    {
        $notaFiscal = (new NotaFiscalBuilder())
            ->comCnpj('12345678901234')
            ->comItem(new ItemOrcamento('Item 1', 100))
            ->comItem(new ItemOrcamento('Item 2', 200))
            ->comObservacoes('Observações')
            ->comRazaoSocial('Empresa')
            ->comDataDeEmissao(new \DateTime())
            ->build();

        self::assertEquals('12345678901234', $notaFiscal->getCNPJ());
    }

}
