<?php

namespace App\Repository\Transaction;

use App\Repository\CrudInterface;

interface TransactionService extends CrudInterface
{
    public function createTransactionByCallBack($callBackData);
}
