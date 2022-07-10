<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Report;

class ExportedXmlFile implements ExportedFile
{
    private string $parentElement;

    public function __construct($parentElement)
    {
        $this->parentElement = $parentElement;
    }

    public function save(Content $content): string
    {
        $xmlElement = new \SimpleXMLElement("<{$this->parentElement} />");
        foreach ($content->content() as $element => $value) {
            $xmlElement->addChild($element, $value);
        }

        $filePath = tempnam(sys_get_temp_dir(), 'xml');
        $xmlElement->asXML($filePath);

        return $filePath;
    }
}