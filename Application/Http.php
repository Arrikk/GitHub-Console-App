<?php

namespace Application;

use GuzzleHttp;
use Infrastructure\Helpers;

class Http
{
    public $req;
    public $headers = [
        "Authorization" => "Bearer " . Config::ACCESS_TOKEN,
        "accept" => "application/vnd.github+json",
        "content-type" => "application/x-www-form-urlencoded",
    ];

    public function __construct()
    {
        $this->req =  new GuzzleHttp\Client([
            'base_uri' => 'https://api.github.com/user/'
        ]);
    }

    public function post($repository_namme)
    {
        try {
            $resp = $this->req->request(
                'POST',
                'repos',
                array(
                    'body' => json_encode([
                        'name' => $repository_namme
                    ]),
                    'headers' => $this->headers
                )
            );
            Helpers::console($resp->getBody());
        } catch (\Throwable $th) {
            Helpers::console("Error Occuerd" . $th);
        }
    }

    public function get()
    {
        try {
            $resp = $this->req->request(
                'GET',
                'repos',
                array(
                    'headers' => $this->headers
                )
            );
            Helpers::console(print_r(json_decode($resp->getBody())));
        } catch (\Throwable $th) {
            Helpers::console("Error Occuerd" . $th);
        }
    }
}
