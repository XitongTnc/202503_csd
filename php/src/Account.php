<?php

declare(strict_types=1);

namespace swkberlin;

class Account implements AccountService
{
    private array $transactions = [];
    private string $currentDate;

    public function setDate(string $date): void
    {
        $this->currentDate = $date;
    }

    public function deposit(int $amount): void
    {
        $this->transactions[] = [
            'date' => $this->currentDate,
            'amount' => $amount
        ];
    }

    public function withdraw(int $amount): void
    {
        $this->transactions[] = [
            'date' => $this->currentDate,
            'amount' => -$amount
        ];
    }

    public function printStatement(): void
    {
        echo "Date       || Amount || Balance\n";
        $balance = 0;

        foreach (array_reverse($this->transactions) as $tx) {
            $balance += $tx['amount'];
            printf(
                "%s || %s   || %d\n",
                $tx['date'],
                $tx['amount'],
                $balance
            );
        }
    }
}
