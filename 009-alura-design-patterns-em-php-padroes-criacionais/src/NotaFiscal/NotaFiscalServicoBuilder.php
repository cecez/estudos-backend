<?php

namespace Alura\DesignPattern\NotaFiscal;

class NotaFiscalServicoBuilder extends NotaFiscalBuilder
{
    public const IMPOSTO_SERVICO = 0.06;

    public function build(): NotaFiscal
    {
        $valorNotaFiscal = $this->notaFiscal->getValor();

        $this->notaFiscal->setValorImposto($valorNotaFiscal * self::IMPOSTO_SERVICO);

        return $this->notaFiscal;
    }
}