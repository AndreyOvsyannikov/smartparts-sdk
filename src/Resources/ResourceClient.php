<?php

namespace Smartparts\Resources;

class ResourceClient extends Resource
{
    public function getStatus() {
        return $this->api->call('GET', 'client/status');
    }

    public function getOptions() {
        return $this->api->call('GET', 'client/options');
    }
}
