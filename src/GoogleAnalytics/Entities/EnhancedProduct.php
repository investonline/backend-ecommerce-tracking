<?php

namespace InvestOnline\GoogleAnalytics\Entities;

/**
 * Class EnhancedProduct
 * @package InvestOnline\GoogleAnalytics\Entities
 */
class EnhancedProduct extends Entity
{

    /**
     * @var array
     */
    protected $fields = [
        'pr%sid'    => 'id',
        'pr%snm'    => 'name',
        'pr%sbr'    => 'brand',
        'pr%sca'    => 'category',
        'pr%sva'    => 'variant',
        'pr%spr'    => 'price',
        'pr%sqt'    => 'quantity',
        'pr%scd1'   => 'dimension1',
        'pr%scd2'   => 'dimension2',
        'pr%scd3'   => 'dimension3',
        'pr%scd4'   => 'dimension4',
        'pr%scd5'   => 'dimension5',
        'pr%scd6'   => 'dimension6',
        'pr%scd7'   => 'dimension7',
        'pr%scd8'   => 'dimension8',
        'pr%scd9'   => 'dimension9',
        'pr%scd10'   => 'dimension10',
    ];

    /**
     * @param $index
     * @return array
     */
    public function getProductQuery($index)
    {
        $query = [];

        foreach($this->fields as $attribute => $name) {
            if (!is_null($this->$attribute)) {
                $query[sprintf($attribute, $index)] = $this->$attribute;
            }
        }

        return $query;
    }


}