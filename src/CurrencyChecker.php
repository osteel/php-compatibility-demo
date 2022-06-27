<?php

namespace Osteel\PhpCompatibilityDemo;

use Money\Money;

class CurrencyChecker
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
}
