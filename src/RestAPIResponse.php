<?php

namespace Smartparts;

use Psr\Http\Message\ResponseInterface;

class RestAPIResponse
{
    private ResponseInterface|null $guzzlyResponse;
    private \Exception|null $exception;
    private int|null $status;
    private array $body;

    public static function createFromResponse(ResponseInterface $response)
    {
        return new RestAPIResponse($response);
    }

    public static function createFromException(\Exception $e)
    {
        return new RestAPIResponse(null, $e);
    }

    private function __construct(ResponseInterface|null $guzzlyResponse = null, \Exception|null $exception = null)
    {
        $this->guzzlyResponse = $guzzlyResponse;
        $this->exception = $exception;
        $this->status = $guzzlyResponse?->getStatusCode();

        try {
            $this->body = $guzzlyResponse ? json_decode($guzzlyResponse?->getBody(), true) : [];
        } catch (\Throwable $th) {
            $this->body = [];
        }
    }

    public function status()
    {
        return $this->status;
    }

    public function body()
    {
        return $this->body;
    }

    public function guzzlyResponse()
    {
        return $this->guzzlyResponse;
    }

    public function exception()
    {
        return $this->exception;
    }
}
