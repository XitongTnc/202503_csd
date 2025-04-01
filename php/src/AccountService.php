<?php

namespace swkberlin;

interface AccountService
{
    public function deposit(int $amount): void;
    public function withdraw(int $amount): void;
    public function printStatement(): void;

}