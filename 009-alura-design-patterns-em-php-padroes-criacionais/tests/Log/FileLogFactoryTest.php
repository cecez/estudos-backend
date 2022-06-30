<?php

namespace Tests\Log;

use Alura\DesignPattern\Log\FileLogFactory;
use PHPUnit\Framework\TestCase;

class FileLogFactoryTest extends TestCase
{
    public function setUp(): void
    {
        $uniqueFileName = uniqid();
        $this->temporaryFilePath = __DIR__ . "/../Files/file-log-$uniqueFileName.txt";
    }

    public function testFileLogWriter() {
        $fileLogFactory = new FileLogFactory($this->temporaryFilePath);
        $fileLogFactory->log("ALERT", "This is a test");

        $fileContents = file_get_contents($this->temporaryFilePath);
        $this->assertFileExists($this->temporaryFilePath);
        $this->assertEquals("[".date('d/m/Y H:i:s')."][ALERT]: This is a test", $fileContents);
    }

    public function tearDown(): void
    {
        if (file_exists($this->temporaryFilePath)) {
            unlink($this->temporaryFilePath);
        }
    }

}
