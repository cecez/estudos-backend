<?php
$stack = new Ds\Stack();

$stack->push("ersten");
$stack->push("zweiten");
$stack->push("dritten");
$stack->push("vierten");

var_dump($stack);

var_dump($stack->pop());
var_dump($stack->pop());

var_dump($stack);

var_dump($stack->peek());
