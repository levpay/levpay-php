<?php

namespace Levpay;

class Levpay {

  /**
   * @return environment
   */
  public $token;

  /**
   * @param string $client_id
   * @param string $secret_key
   * @param string|homolog $environment
   */
  public function __construct($client_id, $secret_key, $environment="homolog") {
    $this->client_id = $client_id;
    $this->secret_key = $secret_key;
    $this->env = $this->environment($environment);
    $this->token = $this->auth();
  }

  /**
   * @param string $environment
   * @return array
   */
  private function environment($environment){
    $env = array();
    if ($environment == "prodution") {
      $env['domain'] = "https://api.levpay.com";
    } else {
      $env['domain'] = "https://homolog.levpay.com";
    }
    return $env;
  }

  private function auth() {
    // http options
    $opts = array('http' =>
      array(
	'method' => 'POST',
	'header' => array(
	  'Content-type: application/json',
	  'Authorization: Basic '.base64_encode("$this->client_id:$this->secret_key")),
      )
    );
    // do request
    $context = stream_context_create($opts);
    $json = file_get_contents($this->env['domain'] . "/publicapi/auth/", false, $context);
    $result = json_decode($json, true);
    if(json_last_error() != JSON_ERROR_NONE){
      return null;
    }
    return $result;
  }

  /**
   * @param array $object
   */
  public function CreateOrder($object) {
    // http options
    $opts = array('http' =>
      array(
	'method' => 'POST',
	'header' => array(
	  'Content-type: application/json',
	  'Authorization: Bearer '.$this->token['token']),
	'content' => json_encode($object, JSON_FORCE_OBJECT)
      )
    );
    // do request
    $context = stream_context_create($opts);
    $json = file_get_contents($this->env['domain'] . "/publicapi/instance/levpay/checkout/", false, $context);
    $result = json_decode($json, true);
    if(json_last_error() != JSON_ERROR_NONE){
      return null;
    }
    return $result;
  }
}
