<?php

namespace Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais;

use Cezarcastrorosa\AluraDesignPatternsEmPhpPadroesEstruturais\Http\HttpAdapter;

class BudgetRegistrator
{
    private HttpAdapter $httpAdapter;

    public function __construct(HttpAdapter $httpAdapter)
    {
        $this->httpAdapter = $httpAdapter;
    }

    public function register(Budget $budget): void
    {
        $this->httpAdapter->post("https://bugdet.registrar", [
            'value' => $budget->value,
            'amountOfItens' => $budget->amountOfItems
        ]);
    }
}