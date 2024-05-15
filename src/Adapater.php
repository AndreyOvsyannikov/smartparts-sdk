<?php

namespace Smartparts;

use Smartparts\Resources\ResourceClient;
use Smartparts\Resources\ResourceCatalog;

class Adapater
{
    private $api;
    private $client;
    private $catalog;

    public function __construct(string $host, string $token)
    {
        $this->api = new RestAPI($host, $token);
        $this->client = new ResourceClient($this->api);
        $this->catalog = new ResourceCatalog($this->api);
    }

    public function api() : RestAPI {
        return $this->api;
    }

    public function client() : ResourceClient {
        return $this->client;
    }

    public function catalog() : ResourceCatalog {
        return $this->catalog;
    }
}
