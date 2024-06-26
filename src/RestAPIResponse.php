<?php

namespace Smartparts;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

class RestAPIResponse
{
    private $guzzlyResponse;
    private $exception;
    private $status;
    private $body;

    public static function createFromResponse(ResponseInterface $response)
    {
        return new RestAPIResponse($response);
    }

    public static function createFromException(RequestException $exception)
    {
        return new RestAPIResponse($exception->getResponse(), $exception);
    }

    private function __construct($guzzlyResponse = null, $exception = null)
    {
		$this->guzzlyResponse = $guzzlyResponse;
		$this->exception = $exception;

		if ( $guzzlyResponse ) {
			$this->status = $guzzlyResponse->getStatusCode();

			try {
				$this->body = $guzzlyResponse ? json_decode($guzzlyResponse->getBody(), true) : [];
			} catch (\Throwable $th) {
				$this->body = [];
			}
		} else if ( $exception ) {
			$this->status = $exception->getCode();
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
