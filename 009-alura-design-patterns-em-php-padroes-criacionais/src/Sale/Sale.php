<?php

namespace Alura\DesignPattern\Sale;

abstract class Sale
{
    protected \DateTimeInterface $date;

    public function __construct(\DateTimeInterface $date)
    {
        $this->date = $date;
    }
}