<?php

require 'vendor/autoload.php';

use InvestOnline\GoogleAnalytics\TransactionCollector;
use InvestOnline\GoogleAnalytics\Entities\Transaction;
use InvestOnline\GoogleAnalytics\Entities\Product;

$transaction = new TransactionCollector('UA-XXXXXXXX-X', '123456789.1234567890');

$t = new Transaction([
    'id'            => 12345,
    'affiliation'   => 'Online Store',
    'revenue'       => 149.95,
    'currency'      => 'EUR'
]);

$t->addProduct(new Product([
    'transaction_id'    => 12345,
    'name'              => 'Yellow Submarine',
    'price'             => 130,
    'quantity'          => 1
]));

$transaction->send($t);