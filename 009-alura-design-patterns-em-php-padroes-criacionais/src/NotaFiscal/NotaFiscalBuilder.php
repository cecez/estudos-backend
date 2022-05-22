<?php

namespace Alura\DesignPattern\NotaFiscal;

class NotaFiscalBuilder
{
    private NotaFiscal $notaFiscal;

    public function __construct()
    {
        $this->notaFiscal = new NotaFiscal();
        $this->notaFiscal->setDataDeEmissao(new \DateTimeImmutable());
    }

    public function comRazaoSocial(string $razaoSocial): self
    {
        $this->notaFiscal->setRazaoSocial($razaoSocial);
        return $this;
    }

    public function comCnpj(string $cnpj): self
    {
        $this->notaFiscal->setCnpj($cnpj);
        return $this;
    }

    public function comItem($item): self
    {
        $this->notaFiscal->addItem($item);
        return $this;
    }

    public function comObservacoes(string $observacoes): self
    {
        $this->notaFiscal->setObservacoes($observacoes);
        return $this;
    }

    public function comDataDeEmissao(\DateTimeInterface $data): self
    {
        $this->notaFiscal->setDataDeEmissao($data);
        return $this;
    }

    public function build(): NotaFiscal
    {
        return $this->notaFiscal;
    }

}