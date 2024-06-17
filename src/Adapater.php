<?php

namespace Smartparts;

use Smartparts\Resources\ResourceClient;
use Smartparts\Resources\ResourceCheckout;
use Smartparts\Resources\ResourceCatalog;

class Adapater
{
    private $api;
    private $client;
    private $catalog;
    private $checkout;

    public function __construct(string $host, string $token)
    {
        $this->api = new RestAPI($host, $token);
        $this->client = new ResourceClient($this->api);
        $this->catalog = new ResourceCatalog($this->api);
        $this->checkout = new ResourceCheckout($this->api);
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

    public function checkout() : ResourceCheckout {
        return $this->checkout;
    }
}
