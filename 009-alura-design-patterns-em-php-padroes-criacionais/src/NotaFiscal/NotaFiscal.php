<?php

namespace Alura\DesignPattern\NotaFiscal;

class NotaFiscal
{
    private string $razaoSocial;
    private string $cnpj;
    private float $valorTotal;
    private \DateTimeInterface $dataDeEmissao;
    private array $itens;
    private float $valorImposto;
    private string $observacoes;

    /**
     * @param  string  $razaoSocial
     */
    public function setRazaoSocial(string $razaoSocial): void
    {
        $this->razaoSocial = $razaoSocial;
    }

    /**
     * @param  string  $cnpj
     */
    public function setCnpj(string $cnpj): void
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @param  float  $valorTotal
     */
    public function setValorTotal(float $valorTotal): void
    {
        $this->valorTotal = $valorTotal;
    }

    /**
     * @param  \DateTimeInterface  $dataDeEmissao
     */
    public function setDataDeEmissao(\DateTimeInterface $dataDeEmissao): void
    {
        $this->dataDeEmissao = $dataDeEmissao;
    }

    public function addItem($item): void
    {
        $this->itens[] = $item;
    }

    /**
     * @param  float  $valorImposto
     */
    public function setValorImposto(float $valorImposto): void
    {
        $this->valorImposto = $valorImposto;
    }

    /**
     * @param  string  $observacoes
     */
    public function setObservacoes(string $observacoes): void
    {
        $this->observacoes = $observacoes;
    }

    public function getCNPJ(): string
    {
        return $this->cnpj;
    }


}