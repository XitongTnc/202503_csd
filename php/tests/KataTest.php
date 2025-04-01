<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use swkberlin\Account;

class KataTest extends TestCase
{
    public function testDeposit(): void
    {
        $account = new Account();
        $this->assertInstanceOf(Account::class, $account);
        $account->deposit(1000);

        ob_start();
        $account->printStatement();
        $output = ob_get_clean();
        $expected = <<<EOT
Date       || Amount || Balance
10/01/2012 || 1000   || 1000
EOT;
        $this->assertEquals($expected, $output);
    }
}
