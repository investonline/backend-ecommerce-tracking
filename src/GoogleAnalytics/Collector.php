<?php

namespace InvestOnline\GoogleAnalytics;

use GuzzleHttp\Client;

/**
 * Class Collector
 * @package InvestOnline\GoogleAnalytics
 */
abstract class Collector
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var
     */
    protected $tracking_id;

    /**
     * @var
     */
    protected $client_id;

    /**
     * Collector constructor.
     * @param $tracking_id
     * @param $client_id
     */
    public function __construct($tracking_id, $client_id)
    {
        $this->tracking_id = $tracking_id;
        $this->client_id = $client_id;

        $this->client = new Client();
    }

    /**
     * @param string $hit_type
     * @param array $query
     */
    protected function collect($hit_type, array $query)
    {
        $query = array_merge([
            'v'     => 1,
            'tid'   => $this->tracking_id,
            'cid'   => $this->client_id,
            't'     => $hit_type
        ], $query);

        $this->client->post('https://www.google-analytics.com/collect', [
            'body' => http_build_query($query)
        ]);
    }

}