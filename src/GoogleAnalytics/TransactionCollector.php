<?php

namespace InvestOnline\GoogleAnalytics;

use InvestOnline\Exceptions\InvalidTransactionException;
use InvestOnline\GoogleAnalytics\Entities\Transaction;

/**
 * Class Transaction
 * @package InvestOnline\GoogleAnalytics
 */
final class TransactionCollector extends Collector
{
    /**
     * @param Transaction $transaction
     * @throws InvalidTransactionException
     */
    public function send(Transaction $transaction)
    {
        if (count($transaction->getProducts()) < 1) {
            throw new InvalidTransactionException("No products added to the transaction");
        }

        $this->collect('transaction', $transaction->toQuery());

        foreach($transaction->getProducts() as $product) {
            $this->collect('item', $product->toQuery());
        }
    }

}