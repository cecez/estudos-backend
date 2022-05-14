<?php

namespace Alura\DesignPattern\Log;

class FileLogFactory extends LogManager
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function createLogWriter(): LogWriter
    {
        return new FileLogWriter($this->filePath);
    }
}