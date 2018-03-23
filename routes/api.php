<?php

use Illuminate\Http\Request;

Route::get('producthunt', 'Api\HomeController@producthunt');

Route::get('/', function() {
  $client = new \GuzzleHttp\Client();

  $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts');

  $response =  json_decode($response->getBody());

  foreach ($response as $post) {
    dump($post);
  }
});
