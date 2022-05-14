<?php

namespace Alura\DesignPattern\Log;

abstract class LogManager
{
    public function log(string $severity, string $message): void
    {
        $formattedMessage = $this->formatMessage($severity, $message);
        $logger = $this->createLogWriter();
        $logger->write($formattedMessage);
    }

    private function formatMessage(string $severity, string $message): string
    {
        return sprintf('[%s][%s]: %s', date('d/m/Y H:i:s'), $severity, $message);
    }

    abstract public function createLogWriter(): LogWriter;
}