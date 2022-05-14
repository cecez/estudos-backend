<?php

namespace Alura\DesignPattern\Log;

interface LogWriter
{
    public function write(string $message): void;
}