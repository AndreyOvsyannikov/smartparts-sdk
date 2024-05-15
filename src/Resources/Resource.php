<?php

namespace Smartparts\Resources;

use Smartparts\RestAPI;

abstract class Resource
{
    protected RestAPI $api;

    public function __construct(RestAPI $api) 
    {
        $this->api = $api;
    }
}
