<?php

namespace Smartparts\Resources;

class ResourceCheckout extends Resource
{
    public function storePreorder(array $data) {
        return $this->api->call('POST', 'checkout/preorder', $data);
    }

    public function isOrderable(array $data) {
        return $this->api->call('POST', 'checkout/is-orderable', $data);
    }
}
