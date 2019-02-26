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
        'cm1'  => 'metric1',
        'cm2'  => 'metric2',
        'cm3'  => 'metric3',
        'cm4'  => 'metric4',
        'cm5'  => 'metric5',
        'cm6'  => 'metric6',
        'cm7'  => 'metric7',
        'cm8'  => 'metric8',
        'cm9'  => 'metric9',
        'cm10' => 'metric10',
    ];

    /**
     * Custom toQuery method
     */
    public function toQuery()
    {
        $query = parent::toQuery();

        $query['pa'] = 'purchase';

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
