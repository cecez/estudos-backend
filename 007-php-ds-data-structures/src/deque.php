<?php

// The name is a common abbreviation of “double-ended queue”
$deque = new Ds\Deque();

$deque->push("null");
$deque->push("eins");
$deque->push("zwei");
$deque->push("drei");

var_dump($deque->capacity());
var_dump($deque);

$valor = $deque->pop();

var_dump($valor);
var_dump($deque);

$valor = $deque->get(1);
var_dump($valor);
var_dump($deque->count());
var_dump($deque->contains("zwei"));

var_dump($deque);
$deque->insert(2, "onde");
var_dump($deque);