<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Report;

interface ExportedFile
{
    public function save(Content $content): string;
}