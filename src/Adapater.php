<?php

namespace Smartparts;

use Smartparts\Resources\ResourceClient;
use Smartparts\Resources\ResourceCheckout;
use Smartparts\Resources\ResourceCatalog;
use Smartparts\Resources\ResourceSearch;

class Adapater
{
    private $api;
    private $client;
    private $catalog;
    private $checkout;
    private $search;

    public function __construct(string $host, string $token)
    {
        $this->api = new RestAPI($host, $token);
        $this->client = new ResourceClient($this->api);
        $this->catalog = new ResourceCatalog($this->api);
        $this->checkout = new ResourceCheckout($this->api);
        $this->search = new ResourceSearch($this->api);
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

    public function search() : ResourceSearch {
        return $this->search;
    }
}
