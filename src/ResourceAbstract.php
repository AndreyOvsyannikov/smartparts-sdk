<?php

namespace Smartparts;

abstract class ResourceAbstract
{
    private $host;
    private $token;

    public function __construct(string $host, string $token)
    {
        $this->host = $host;
        $this->token = $token;
    }

    protected function callAPI(string $method, array $data = []) : array
    {
        $requestUrl = $this->host . '/' . $method;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $requestUrl);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_UNICODE));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $this->token,
            'Content-Type: application/json',
            'Accept: application/json',
        ));

        $response = curl_exec($curl);
        $last_error = curl_errno($curl);

        if ($last_error) {
            $output = [
                'error'		=> $last_error,
                'message'	=> curl_strerror($last_error),
            ];
        } else {
            try {
                $output = json_decode($response, true);
            } catch (\Throwable $th) {
                $output = [
                    'error'		=> $th->getCode(),
                    'message'	=> $th->getMessage(),
                ];
            }
        }

        curl_close($curl);

        return $output && count($output) ? $output : [
            'error'		=> 0,
            'message'	=> 'No response.',
        ];
    }
}
