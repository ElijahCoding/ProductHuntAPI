<?php

namespace App\Services;

use GuzzleHttp\Client;

abstract class ServiceAbstract
{
  protected $client;

  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  abstract public function get($limit = 10);
}
