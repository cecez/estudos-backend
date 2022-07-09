<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Http;

interface HttpAdapter
{
    public function post(string $url, array $data = []): void;
}
