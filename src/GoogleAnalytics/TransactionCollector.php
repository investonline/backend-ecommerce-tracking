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
     * @param boolean $debug
     * @return array
     * @throws InvalidTransactionException
     */
    public function send(Transaction $transaction, $debug = false)
    {
        if (count($transaction->getProducts()) < 1) {
            throw new InvalidTransactionException("No products added to the transaction");
        }

        $response = [];

        $response[] = $this->collect('transaction', $transaction->toQuery(), $debug);

        foreach($transaction->getProducts() as $product) {
            $response[] = $this->collect('item', $product->toQuery(), $debug);
        }

        return $response;
    }

}