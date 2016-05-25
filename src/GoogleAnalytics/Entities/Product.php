<?php

namespace InvestOnline\GoogleAnalytics\Entities;

use InvestOnline\Exceptions\InvalidProductException;

/**
 * Class Product
 * @package InvestOnline\GoogleAnalytics\Entities
 */
final class Product extends Entity
{

    /**
     * @var
     */
    protected $transaction_id;

    /**
     * @var array
     */
    protected $fields = [
        'ti'    => 'transaction_id',
        'in'    => 'name',
        'ip'    => 'price',
        'iq'    => 'quantity',
        'ic'    => 'code',
        'iv'    => 'category',
        'cu'    => 'currency'
    ];

    /**
     * @var array
     */
    protected $required = ['transaction_id', 'name'];

    /**
     * @var
     */
    protected $exception = InvalidProductException::class;

    /**
     * Product constructor.
     * @param array $data
     * @throws InvalidProductException
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }

}