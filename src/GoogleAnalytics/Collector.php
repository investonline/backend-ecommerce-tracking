<?php

namespace InvestOnline\GoogleAnalytics;

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

        $request = curl_init('https://www.google-analytics.com/collect');

        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_POSTFIELDS, http_build_query($query));
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($request, CURLOPT_USERAGENT, 'Backend Ecommerce Tracking');

        curl_exec($request);
        curl_close($request);
    }

}