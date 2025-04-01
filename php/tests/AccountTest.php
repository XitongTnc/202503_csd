<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use swkberlin\Account;

class AccountTest extends TestCase
{
    public function test_single_deposit_prints_correct_statement(): void
    {
        $account = new Account();
        $account->setDate('10/01/2012');
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
