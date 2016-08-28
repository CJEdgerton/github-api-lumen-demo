<?php

namespace App\Http\Handlers;

use GuzzleHttp\Client;


class ApiHandler
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.github.com/'
        ]);
    }

    public function getMostStarredPhpRepos()
    {
        $data = $this->client->get('search/repositories?q=language:php&sort=stars&order=desc')->getBody();
        
        return (json_decode($data))->items;
    }

    public function getUser($user)
    {
        $data = $this->client->get('users/' . $user)->getBody();
        
        return (json_decode($data));
    }
}
