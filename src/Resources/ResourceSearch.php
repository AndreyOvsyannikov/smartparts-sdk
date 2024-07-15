<?php

namespace Smartparts\Resources;

class ResourceSearch extends Resource
{
    public function getSimple(string $query) {
        return $this->api->call('GET', 'search/simple', [
            'query'  => $query,
        ]);
    }
}
