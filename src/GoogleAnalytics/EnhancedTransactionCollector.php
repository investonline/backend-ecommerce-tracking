<?php

namespace InvestOnline\GoogleAnalytics;

use InvestOnline\Exceptions\InvalidTransactionException;
use InvestOnline\GoogleAnalytics\Entities\EnhancedTransaction;

/**
 * Class EnhancedTransactionCollector
 * @package InvestOnline\GoogleAnalytics
 */
final class EnhancedTransactionCollector extends Collector
{

    /**
     * @param EnhancedTransaction $transaction
     * @throws InvalidTransactionException
     */
    public function send(EnhancedTransaction $transaction)
    {
        if (count($transaction->getProducts()) < 1) {
            throw new InvalidTransactionException("No products added to the transaction");
        }

        $this->collect('transaction', $transaction->toQuery());
    }

}