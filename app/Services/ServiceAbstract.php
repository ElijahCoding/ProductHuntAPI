<?php

namespace App\Services;

use GuzzleHttp\Client;

abstract class ServiceAbstract
{
  protected $client;

  protected $token = '90d4dd1eb9117863f5d7256f0ab2c2287e52d5063913ffd264306c4c0f2615e0';
  
  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  abstract public function get($limit = 10);
}
