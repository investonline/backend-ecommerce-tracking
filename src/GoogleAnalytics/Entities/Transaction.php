<?php

namespace InvestOnline\GoogleAnalytics\Entities;

use InvestOnline\Exceptions\InvalidTransactionException;

/**
 * Class Transaction
 * @package InvestOnline\GoogleAnalytics\Entities
 */
final class Transaction extends Entity
{

    /**
     * @var array
     */
    protected $products = [];

    /**
     * @var array
     */
    protected $fields = [
        'ti'    => 'id',
        'ta'    => 'affiliation',
        'tr'    => 'revenue',
        'ts'    => 'shipping',
        'tt'    => 'tax',
        'cu'    => 'currency'
    ];

    /**
     * @var array
     */
    protected $required = [
        'id'
    ];

    /**
     * @var
     */
    protected $exception = InvalidTransactionException::class;

    /**
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }
}