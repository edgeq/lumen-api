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
        $request = new Request('GET', 'https://randomuser.me/api');
        $promise = $client->sendAsync($request)
            ->then(
                function (Response $resp) {
                    $body = $resp->getBody()->getContents();
                    /**
                     * Manipulates API to include the following:
                     *
                     *
                     * {
                     *   name: [Title => results.name.title] [first => results.name.first] [last => results.name.last]}
                     *   email: [email = results.email]
                     *   photo: [photo url => results.picture.thumbnail]
                     *   birthday: [formatted birthday, April 24, 2012 => redults.dob(formatted)]
                     * }
                     */

                    $response   = json_decode($body, true);
                    $title      = $response["results"][0]["name"]["title"];
                    $first_name = $response["results"][0]["name"]["first"];
                    $last_name  = $response["results"][0]["name"]["last"];
                    $email      = $response["results"][0]["email"];
                    $photo      = $response["results"][0]["picture"]["thumbnail"];
                    $birthday   = $response["results"][0]["dob"]["date"];
                    $dob        = strtotime($birthday);
                    $dob_formatted = date('F d, Y', $dob);

                    $res_object = [
                        // "title" => $title,
                        // "first_name" => $first_name,
                        // "last_name" => $last_name,
                        "name" => "${title} ${first_name} ${last_name}",
                        "email" => $email,
                        "photo" => $photo,
                        "birthday" => $dob_formatted,

                    ];
                    return $res_object;
                },
                function (RequestException $e) {
                    echo $e->getMessage();
                }
            );
        return $promise->wait();
    }
}