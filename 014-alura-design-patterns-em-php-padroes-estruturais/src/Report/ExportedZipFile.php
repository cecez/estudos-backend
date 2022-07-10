<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Report;

class ExportedZipFile implements ExportedFile
{
    private string $internFileName;

    public function __construct(string $internFileName)
    {
        $this->internFileName = $internFileName;
    }

    public function save(Content $content): string
    {
        $filePath = tmpfile();
        $zipFile = new \ZipArchive();
        $zipFile->open($filePath);
        $zipFile->addFromString($this->internFileName, serialize($content->content()));
        $zipFile->close();

        return $filePath;
    }
}