<?php
namespace App\MetaWhether;

use Exception;
use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class API {
  private $client;
  public function __construct() {
    $this->client = new Client(['base_uri' => env('API_URL') . 'api/']);
  }
  public function get() {
    try {
      $response = $this->client->get('location/1154781/');
      return json_decode($response->getBody()->getContents());
    } catch(RequestException $e) {
      if ($e->hasResponse()) {
        throw new Exception(Psr7\str($e->getResponse()));
      }
    }
  }
}