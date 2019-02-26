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
        'ti'   => 'id',
        'ta'   => 'affiliation',
        'tr'   => 'revenue',
        'ts'   => 'shipping',
        'tt'   => 'tax',
        'cu'   => 'currency',
        'tcc'  => 'coupon',
        'pal'  => 'list',
        'cd1'  => 'dimension1',
        'cd2'  => 'dimension2',
        'cd3'  => 'dimension3',
        'cd4'  => 'dimension4',
        'cd5'  => 'dimension5',
        'cd6'  => 'dimension6',
        'cd7'  => 'dimension7',
        'cd8'  => 'dimension8',
        'cd9'  => 'dimension9',
        'cd10' => 'dimension10',
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
