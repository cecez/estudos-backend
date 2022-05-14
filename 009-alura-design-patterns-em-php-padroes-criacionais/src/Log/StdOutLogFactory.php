<?php

namespace Alura\DesignPattern\Log;

class StdOutLogFactory extends LogManager
{
    public function createLogWriter(): LogWriter
    {
        return new StdOutLogWriter();
    }
}