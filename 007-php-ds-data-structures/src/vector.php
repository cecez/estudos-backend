<?php

$vector = new Ds\Vector();

$vector->push("null");
$vector->push("eins");
$vector->push("zwei");
$vector->push("drei");

var_dump("Capacity: " . $vector->capacity());
var_dump($vector);