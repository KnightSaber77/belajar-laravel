<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/23/2018
 * Time: 4:19 PM
 */

namespace App\Core\Repositories;

use App\Core\Models\Transaction;

class TransactionRepository
{
    public function transactionAdd($transaction)
    {
        $transaction->save();
    }
}
