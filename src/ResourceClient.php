<?php

namespace Smartparts;

class ResourceClient extends ResourceAbstract
{
    public function getStatus() : array {
        return $this->callAPI('client/getStatus');
    }

    public function getOptions() : array {
        return $this->callAPI('client/getOptions');
    }

    public function getNewToken() : array {
        return $this->callAPI('client/getNewToken');
    }
}
