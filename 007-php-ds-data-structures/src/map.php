<?php

$map = new Ds\Map();

$map->put(1, "eins");
$map->put(2, "zwei");
$map->put(3, "drei");
$map->put(4, "vier");

var_dump($map);
var_dump($map->capacity());
$map->putAll(["funf", "sechs"]);
var_dump($map);