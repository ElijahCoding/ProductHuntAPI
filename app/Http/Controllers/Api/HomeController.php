<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Services\ProductHunt;
use App\Http\Controllers\Controller;
use App\Transformers\ProductHuntTransformer;

class HomeController extends Controller
{
    protected $client;

    public function __construct(Client $client)
    {
      $this->client = $client;
    }

    public function producthunt($limit = 21)
    {
        $data = json_encode((new ProductHunt($this->client))->get($limit));


        // dd(json_decode($data));
        return (new ProductHuntTransformer(json_decode($data)))->create();
    }


}
