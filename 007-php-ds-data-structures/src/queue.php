<?php

$queue = new Ds\Queue();

$queue->push("primeiro");
$queue->push("segundo");
$queue->push("terceiro");

var_dump($queue);

$primeiroDaFila = $queue->pop();
var_dump($primeiroDaFila);