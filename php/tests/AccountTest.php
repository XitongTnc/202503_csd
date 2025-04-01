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

    public function test_multiple_transactions_print_in_reverse_order_with_running_balance()
    {
        $account = new Account();

        $account->setDate('10/01/2012');
        $account->deposit(1000);

        $account->setDate('13/01/2012');
        $account->deposit(2000);

        $account->setDate('14/01/2012');
        $account->withdraw(500);

        ob_start();
        $account->printStatement();
        $output = ob_get_clean();

        $expected = <<<EOT
Date       || Amount || Balance
14/01/2012 ||  -500  || 2500
13/01/2012 ||  2000  || 3000
10/01/2012 ||  1000  || 1000

EOT;

        $this->assertEquals($expected, $output);
    }

}
