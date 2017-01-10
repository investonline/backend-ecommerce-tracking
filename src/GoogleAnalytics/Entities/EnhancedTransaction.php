<?php

namespace InvestOnline\GoogleAnalytics\Entities;

/**
 * Class EnhancedTransaction
 * @package InvestOnline\GoogleAnalytics\Entities
 */
class EnhancedTransaction extends Entity
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
     * Custom toQuery method
     */
    public function toQuery()
    {
        $query = parent::toQuery();

        foreach($this->getProducts() as $index => $product)
        {
            $query = array_merge($query, $product->getProductQuery($index+1));
        }

        return $query;
    }

    /**
     * @param EnhancedProduct $product
     */
    public function addProduct(EnhancedProduct $product)
    {
        $this->products[] = $product;
    }

    /**
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }

}