<?php

namespace Alura\DesignPattern\Log;

class FileLogWriter implements LogWriter
{

    private $file;

    public function __construct(string $file)
    {
        $this->file = fopen($file, 'a+');
    }

    public function write(string $message): void
    {
        fwrite($this->file, $message);
    }

    public function __destruct()
    {
        fclose($this->file);
    }
}