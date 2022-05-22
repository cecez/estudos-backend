<?php

namespace Alura\DesignPattern\NotaFiscal;

class NotaFiscalProdutoBuilder extends NotaFiscalBuilder
{
    public const IMPOSTO_PRODUTO = 0.03;

    public function build(): NotaFiscal
    {
        $valorNotaFiscal = $this->notaFiscal->getValor();

        $this->notaFiscal->setValorImposto($valorNotaFiscal * self::IMPOSTO_PRODUTO);

        return $this->notaFiscal;
    }
}