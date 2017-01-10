<?php

require 'vendor/autoload.php';

use InvestOnline\GoogleAnalytics\EnhancedTransactionCollector;
use InvestOnline\GoogleAnalytics\Entities\EnhancedTransaction;
use InvestOnline\GoogleAnalytics\Entities\EnhancedProduct;

$transaction = new EnhancedTransactionCollector('UA-XXXXXXXX-X', '123456789.1234567890');

$t = new EnhancedTransaction([
    'id'            => 12345,
    'affiliation'   => 'Online Store',
    'revenue'       => 149.95,
    'currency'      => 'EUR'
]);

$t->addProduct(new EnhancedProduct([
    'name'              => 'Yellow Submarine',
    'price'             => 130,
    'quantity'          => 1,
    'dimension1'        => 'KAAKDORST'
]));

$transaction->send($t);