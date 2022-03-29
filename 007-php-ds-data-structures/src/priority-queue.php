<?php

$priorityQueue = new Ds\PriorityQueue();

$priorityQueue->push("item um", 100);
$priorityQueue->push("item dois", 200);
$priorityQueue->push("item tres", 10);

$itemPrioritario = $priorityQueue->pop();
var_dump($itemPrioritario);