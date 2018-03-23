<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Services\ProductHunt;
use App\Transformers\ProductHuntTransformer;

class HomeController extends Controller
{
    protected $client;

    public function __construct(Client $client)
    {
      $this->client = $client;
    }

    public function producthunt($limit = 10)
    {
        $data = json_encode((new ProductHunt($this->client))->get($limit));


        // dd(json_decode($data));
        return (new ProductHuntTransformer(json_decode($data)))->create();
    }


}
