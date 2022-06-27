<?php

namespace Osteel\PhpCompatibilityDemo;

use Money\Currencies\ISOCurrencies;
use Money\Money;

class CurrencyHelper
{
    public function isSame(Money ...$amounts): bool
    {
        if (count($amounts) === 1) {
            return true;
        }

        $first = array_shift($amounts);

        foreach ($amounts as $amount) {
            if (! $first->isSameCurrency($amount)) {
                return false;
            }
        }

        return true;
    }

    public function numericCode(Money $amount): int
    {
        return (new ISOCurrencies())->numericCodeFor($amount->getCurrency());
    }
}
