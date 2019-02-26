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
     * @param boolean $debug
     * @return mixed
     * @throws InvalidTransactionException
     */
    public function send(EnhancedTransaction $transaction, $debug = false)
    {
        if (count($transaction->getProducts()) < 1) {
            throw new InvalidTransactionException("No products added to the transaction");
        }

        return $this->collect('event', $transaction->toQuery(), $debug);
    }

}