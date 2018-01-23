<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/23/2018
 * Time: 4:10 PM
 */

namespace App\Core\Services;

use App\Core\Models\Product;
use App\Core\Models\Transaction;
use App\Core\Repositories\TransactionRepository;

class TransactionService
{
    private $transactionRepository;
    public function __construct()
    {
        $this->transactionRepository = new TransactionRepository();
    }

    public function transactionAdd($payment_id, $nomor_hp, $product_name, $status, $price)
    {
        $transaction = new Transaction();
        $transaction->payment_id = $payment_id;
        $transaction->nomor_hp = $nomor_hp;
        $transaction->product_name = $product_name;
        $transaction->status = $status;
        $transaction->price = $price;

        $this->transactionRepository->transactionAdd($transaction);
        return $transaction;
    }
}