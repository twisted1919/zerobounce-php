<?php
/**
 * Example file to show how we can get the number of credits in our account
 */

require_once __DIR__ . '/../vendor/autoload.php';

use ZeroBounce\HttpClient\HttpClient;
use ZeroBounce\Api;

try {
    
    /** @var string $apiKey */
    $apiKey = (string)getenv('ZEROBOUNCE_API_KEY');
    
    /** @var HttpClient $client */
    $client = new ZeroBounce\HttpClient\HttpClient($apiKey);
    
    /** @var Api $api */
    $api = new ZeroBounce\Api($client);
    
    /** @var \ZeroBounce\Response\CreditsResponse $response */
    $response = $api->credits();
    
    if ($response->hasError()) {
        var_dump($response->getError());
    } else {
        var_dump($response->getCredits());
    }
} catch (Exception $e) {
    throw $e;
}
