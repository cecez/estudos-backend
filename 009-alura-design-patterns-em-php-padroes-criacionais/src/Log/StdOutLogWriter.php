<?php

namespace Alura\DesignPattern\Log;


class StdOutLogWriter implements LogWriter
{
    public function write(string $message): void
    {
        echo $message;
    }
}