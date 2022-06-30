<?php

use Alura\DesignPattern\Pedido\PedidoFactory;
use Alura\DesignPattern\Orcamento;

require 'vendor/autoload.php';

$pedidos = [];
$pedidoFactory = new PedidoFactory();

for ($i = 0; $i < 10000; $i++) {
    $orcamento = new Orcamento();

    try {
        $pedido = $pedidoFactory->createPedido('Cezar Rosa', date('Y-m-d'), $orcamento);
        $pedidos[] = $pedido;
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}

echo memory_get_peak_usage();
