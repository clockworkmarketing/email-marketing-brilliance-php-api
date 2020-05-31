<?php

namespace ClockworkMarketing\EmailMarketingBrilliance;

use GuzzleHttp\Client;

class Request
{
    public $api_id;
    public $api_key;
    protected $client;


    public function __construct($api_id, $api_key, $client_options = [])
    {
        $this->api_id = $api_id;
        $this->api_key = $api_key;

        $options = array_merge(
            [
                    'base_uri' => 'https://app.emailmarketingbrilliance.co.uk/rest/',
                    'http_errors' => false,
                    'timeout' => 10,
                ],
            $client_options
        );

        $this->client = new Client(
            $options
        );
    }

    private function request($method, $request, $options)
    {
        $client = $this->client;

        // Initialise the results of the API request
        $results = [];
        $results['valid'] = false;

        // Get our API ID and Key
        $options['api_id'] = $this->api_id;
        $options['api_key'] = $this->api_key;

        $additional_options = [];

        $request = ltrim($request, '/');



        if ($method === 'POST') {
            $additional_options = [
                'form_params' => $options,
            ];
        } else {
            $request = sprintf("%s?%s", $request, http_build_query($options));
        }


        $response = $client->request($method, $request, $additional_options);



        if (($code = $response->getStatusCode()) !== 200) {
            // Return the error message for error handling
            $results['http_code'] = $code;
            $results['error'] = json_decode($response->getBody()->getContents(), true);

            return $results;
        } else {
            // We need to examine the response to see if it succeeded
            $return = $response->getBody();
            $results['http_code'] = $response->getStatusCode();
            $results['valid'] = true;
            // Or if we're handling a zip file
            if ($response->getHeader('Content-Type')[0] === 'application/zip') {
                // Build an array of file info
                $results['response']['content_length'] = $response->getHeader('Content-Length');
                $results['response']['content_name'] = $options['filename'] . '.zip';
                $results['response']['content_type'] = $response->getHeader('Content-Type')[0];
                $results['response']['content'] = $return;
            } else {
                // Decode the JSON response
                $results['response'] = json_decode($return, true);
            }
        }


        // Return the API request results
        return $results;
    }

    public function get($request, $options = [])
    {
        return $this->request('GET', $request, $options);
    }

    public function post($request, $options)
    {
        return $this->request('POST', $request, $options);
    }
}
