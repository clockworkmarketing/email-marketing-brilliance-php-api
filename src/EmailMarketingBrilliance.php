<?php

namespace ClockworkMarketing\EmailMarketingBrilliance;

class EmailMarketingBrilliance
{
    protected $request;

    public static function setAuthDetails($api_id, $api_key, $client_options = [])
    {
        return new static($api_id, $api_key, $client_options);
    }

    public function __construct($api_id, $api_key, $client_options = [])
    {
        $this->request = new Request(
            $api_id,
            $api_key,
            $client_options
        );
    }

    public function call($method, $endpoint, $data)
    {
        $method = strtolower($method);
        $method = $method == 'post' ? 'post' : 'get';

        return $this->request->{$method}($endpoint, $data);
    }
}
