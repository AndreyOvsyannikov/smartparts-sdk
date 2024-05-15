<?php

namespace Smartparts\Resources;

class ResourceCatalog extends Resource
{
    public function getHome() {
        return $this->api->call('GET', 'catalog/home');
    }

    public function getNode(string $slug) {
        return $this->api->call('GET', 'catalog/node', [
            'slug'  => $slug,
        ]);
    }

    public function getSpare(string $slug) {
        return $this->api->call('GET', 'catalog/spare', [
            'slug'  => $slug,
        ]);
    }
}
