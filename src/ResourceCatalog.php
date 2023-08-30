<?php

namespace Smartparts;

class ResourceCatalog extends ResourceAbstract
{
    public function getHome() : array {
        return $this->callAPI('catalog/getHome');
    }

    public function getNode(string $slug) : array {
        return $this->callAPI('catalog/getNode', [
            'slug'  => $slug,
        ]);
    }

    public function getSpare(string $slug) : array {
        return $this->callAPI('catalog/getSpare', [
            'slug'  => $slug,
        ]);
    }
}
