<?php

namespace InvestOnline\GoogleAnalytics\Entities;

use Exception;

/**
 * Class Entity
 * @package InvestOnline\GoogleAnalytics\Entities
 */
abstract class Entity
{

    protected $fields = [];

    protected $required = [];

    protected $exception = Exception::class;

    /**
     * Entity constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach($this->required as $field) {
            if (!array_key_exists($field, $data) || empty($data[$field])) {
                throw new $this->exception(sprintf("Missing or empty '%s' attribute", $field));
            }
        }

        foreach($this->fields as $attribute => $index) {
            if (array_key_exists($index, $data)) {
                $this->$attribute = $data[$index];
            }
        }
    }

    /**
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        }

        return null;
    }

    /**
     * @return array
     */
    public function toQuery()
    {
        $query = [];

        foreach($this->fields as $attribute => $name) {
            if (!is_null($this->$attribute)) {
                $query[$attribute] = $this->$attribute;
            }
        }

        return $query;
    }
}