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
        $client = new Client(['headers' => null]);
        $request = new Request('GET', 'https://randomuser.me/api');
        $promise = $client->sendAsync($request)
            ->then(
                function (Response $resp) {
                    // $headers = $resp->getHeaders();
                    $body = $resp->getBody();
                    $string = $body->getContents();
                    $json = json_decode($string);
                    echo response()->json($json);
                    // echo $headers;
                },
                function (RequestException $e) {
                    echo $e->getMessage();
                }
            );
        $promise->wait();
    }
}