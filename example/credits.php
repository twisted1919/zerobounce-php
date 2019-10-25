<?php
/**
 * Example file to show how we can get the number of credits in our account
 */

require_once __DIR__ . '/../vendor/autoload.php';

use ZeroBounce\HttpClient\HttpClient;
use ZeroBounce\Api;
use ZeroBounce\Response\CreditsResponse;

try {
    
    /** @var string $apiKey */
    $apiKey = (string)getenv('ZEROBOUNCE_API_KEY');
    
    /** @var HttpClient $client */
    $client = new HttpClient($apiKey);
    
    /** @var Api $api */
    $api = new Api($client);
    
    /** @var CreditsResponse $response */
    $response = $api->credits();

    var_dump($response->getCredits());
} catch (Exception $e) {
    throw $e;
}
