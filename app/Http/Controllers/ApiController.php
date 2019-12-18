<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Http\Response;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;

class ApiController extends Controller
{
    //
    public function get_user()
    {
        $client = new Client();
        $request = new Request('GET', 'https://randomuser.me/api', ['headers' => ['Content-Type' => 'application/json']]);
        $promise = $client->sendAsync($request)
            ->then(
                function (Response $resp) {
                    $body = $resp->getBody()->getContents();
                    return json_decode($body, true);
                },
                function (RequestException $e) {
                    echo $e->getMessage();
                }
            );
        return $promise->wait();
    }
}