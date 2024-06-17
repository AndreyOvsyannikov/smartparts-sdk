<?php

namespace Smartparts\Resources;

class ResourceCheckout extends Resource
{
    public function postPreorder(array $data) {
        return $this->api->call('POST', 'checkout/preorder', $data);
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
