<?php

namespace Osteel\PhpCompatibilityDemo\Tests;

use Money\Money;
use Osteel\PhpCompatibilityDemo\CurrencyChecker;
use PHPUnit\Framework\TestCase;

class CurrencyCheckerTest extends TestCase
{
    public function testItReturnsWhetherCurrenciesAreTheSame()
    {
        $checker = new CurrencyChecker();

        $amount1 = Money::EUR(10);
        $amount2 = Money::EUR(20);
        $amount3 = Money::EUR(15);
        $amount4 = Money::USD(10);

        $this->assertTrue($checker->isSame($amount1, $amount2));
        $this->assertTrue($checker->isSame($amount1, $amount2, $amount3));
        $this->assertFalse($checker->isSame($amount1, $amount4));
        $this->assertFalse($checker->isSame($amount1, $amount2, $amount4));
    }
}
