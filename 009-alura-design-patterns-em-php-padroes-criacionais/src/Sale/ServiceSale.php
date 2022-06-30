<?php

namespace Alura\DesignPattern\Sale;

class ServiceSale extends Sale
{
    private string $serviceProvider;

    public function __construct(\DateTimeInterface $date, string $serviceProvider)
    {
        parent::__construct($date);
        $this->serviceProvider = $serviceProvider;
    }
}