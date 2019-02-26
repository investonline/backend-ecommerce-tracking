<?php

require 'vendor/autoload.php';

use InvestOnline\GoogleAnalytics\EnhancedTransactionCollector;
use InvestOnline\GoogleAnalytics\Entities\EnhancedTransaction;
use InvestOnline\GoogleAnalytics\Entities\EnhancedProduct;

$transaction = new EnhancedTransactionCollector('UA-XXXXXXXX-XX', '123456789.123456789');

$t = new EnhancedTransaction([
    'id'            => 12345,
    'affiliation'   => 'Online Store',
    'revenue'       => 149.95,
    'currency'      => 'EUR'
]);

$t->addProduct(new EnhancedProduct([
    'id'            => 6063,
    'name'          => 'Hotel de kartonnen doos',
    'price'         => 95.95,
    'brand'         => 'Stedentrips',
    'category'      => 'nederland/gelderland/apeldoorn',
    'variant'       => '',
    'dimension1'    => 2,
    'dimension2'    => '2016-01-01',
    'dimension3'    => 2,
    'dimension4'    => '2 persoonskamer',
    'dimension5'    => 'hoteldeal',
    'dimension6'    => 32,
    'dimension7'    => 'https://www.hoteldeal.nl/6063/mooie-actie-met-leuke-dingen',
    'quantity'      => 4,
]));

$debug = $transaction->send($t, true);