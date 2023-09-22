<?php

namespace Smartparts;

class ResourceCustomer extends ResourceAbstract
{
    public function init(string $replica_customer_id = null) : array {
        return $this->callAPI('customer/init', !$replica_customer_id ? [] : [
            'replica_id'    => $replica_customer_id
        ]);
    }

    public function get(string $customer_id) : array {
        return $this->callAPI('customer/get', [
            'id'            => $customer_id,
        ]);
    }

    public function addCart(string $customer_id, string $spare_slug, int $quantity = 1) : array {
        return $this->callAPI('customer/addCart', [
            'id'            => $customer_id,
            'slug'          => $spare_slug,
            'quantity'      => $quantity
        ]);
    }

    public function removeCart(string $customer_id, string $spare_slug) : array {
        return $this->callAPI('customer/removeCart', [
            'id'            => $customer_id,
            'slug'          => $spare_slug,
        ]);
    }

    public function clearCart(string $customer_id) : array {
        return $this->callAPI('customer/clearCart', [
            'id'            => $customer_id,
        ]);
    }

    public function addGarage(string $customer_id, string $node_slug) : array {
        return $this->callAPI('customer/addGarage', [
            'id'            => $customer_id,
            'slug'          => $node_slug,
        ]);
    }

    public function removeGarage(string $customer_id, string $node_slug) : array {
        return $this->callAPI('customer/removeGarage', [
            'id'            => $customer_id,
            'slug'          => $node_slug,
        ]);
    }

    public function clearGarage(string $customer_id) : array {
        return $this->callAPI('customer/clearGarage', [
            'id'            => $customer_id,
        ]);
    }

    public function createOrder(string $customer_id, array $data) : array {
        return $this->callAPI('customer/createOrder', [
            'id'            => $customer_id,
            'data'          => $data,
        ]);
    }

    public function getOrders(string $customer_id, int $page = 1) : array {
        return $this->callAPI('customer/getOrders', [
            'id'            => $customer_id,
            'page'          => $page,
        ]);
    }
}
