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

    public function transactionAdd($paymentId, $nomorHp, $productName, $status, $price)
    {
        $transaction = new Transaction();
        $transaction->payment_id = $paymentId;
        $transaction->nomor_hp = $nomorHp;
        $transaction->product_name = $productName;
        $transaction->status = $status;
        $transaction->price = $price;

        $this->transactionRepository->transactionAdd($transaction);
        return $transaction;
    }
}