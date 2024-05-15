<?php

namespace Smartparts;

use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Client;

class RestAPI
{
    private string $host;
    private string $token;

    public function __construct(string $host, string $token)
    {
        $this->host = trim($host, "/ \t\n\r\0\x0B") . '/';
        $this->token = $token;
    }

    public function host() : string {
        return $this->host;
    }

    public function token() : string {
        return $this->token;
    }

    public function call(string $method, string $uri, array $data = []) : RestAPIResponse
    {
        $client = new Client([
            'base_uri' => $this->host,
            'timeout'  => 2.0,
        ]);

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '. $this->token
        ];

        try {
            $response = $client->request($method, $uri, [
                'headers'   => $headers,
                'query'     => $data,
            ]);

            return RestAPIResponse::createFromResponse($response);
        } catch (TransferException $e) {
            return RestAPIResponse::createFromException($e);
        }
    }
}
