<?php

namespace Smartparts;

class Adapater
{
    private $host;
    private $token;

    public function __construct(string $host, string $token)
    {
        $this->host = $host;
        $this->token = $token;
    }

    public function setHost(string $host) : self {
        $this->host = $host;
        return $this;
    }

    public function setToken(string $token) : self {
        $this->token = $token;
        return $this;
    }

    public function getHost() : string {
        return $this->host;
    }

    public function getToken() : string {
        return $this->token;
    }

    public function client() : ResourceClient {
        return new ResourceClient($this->host, $this->token);
    }

    public function catalog() : ResourceCatalog {
        return new ResourceCatalog($this->host, $this->token);
    }
}
