<?php

$set = new Ds\Set();

$set->add("null");
$set->add("eins");
$set->add("zwei");
$set->add("drei");
$set->add("zwei");
$set->add("zwei");
$set->remove("zwei");

var_dump($set);
var_dump($set->capacity());
var_dump($set->contains("zwei"));