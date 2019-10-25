<?php
/**
 * Example file to show how we can validate an email address
 */

require_once __DIR__ . '/../vendor/autoload.php';

use ZeroBounce\HttpClient\HttpClient;
use ZeroBounce\Api;
use ZeroBounce\Response\ValidateResponse;

try {
    
    /** @var string $apiKey */
    $apiKey = (string)getenv('ZEROBOUNCE_API_KEY');
    
    /** @var HttpClient $client */
    $client = new HttpClient($apiKey);
    
    /** @var Api $api */
    $api = new Api($client);
    
    /** @var ValidateResponse $response */
    $response = $api->validate('valid@example.com');
    
    if ($response->hasError()) {
        var_dump($response->getError());
    } else {
        var_dump($response->isValid());
        var_dump($response->getAddress());
        var_dump($response->isAbuse());
        var_dump($response->isCatchAll());
    }
} catch (Exception $e) {
    throw $e;
}
