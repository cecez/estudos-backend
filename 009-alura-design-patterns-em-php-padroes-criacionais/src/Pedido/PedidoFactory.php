<?php

namespace Alura\DesignPattern\Pedido;

use Alura\DesignPattern\Orcamento;
use Exception;

class PedidoFactory
{
    private array $templates = [];

    /**
     * @throws Exception
     */
    public function createPedido(string $nomeCliente, string $dataFormatada, Orcamento $orcamento) : Pedido
    {
        $template = $this->getTemplatePedido($nomeCliente, $dataFormatada);
        $pedido = new Pedido();
        $pedido->template = $template;
        $pedido->orcamento = $orcamento;

        return $pedido;
    }

    /**
     * @param  string  $nomeCliente
     * @param  string  $dataFormatada
     * @return TemplatePedido
     * @throws Exception
     */
    public function getTemplatePedido(string $nomeCliente, string $dataFormatada): TemplatePedido
    {
        $hashTemplate = md5($nomeCliente . $dataFormatada);

        if (!array_key_exists($hashTemplate, $this->templates)) {
            $this->templates[$hashTemplate] = new TemplatePedido($nomeCliente, new \DateTimeImmutable($dataFormatada));
        }

        return $this->templates[$hashTemplate];
    }
}