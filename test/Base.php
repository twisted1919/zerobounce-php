<?php declare(strict_types=1);

namespace ZeroBounce\Test;

use PHPUnit\Framework\TestCase;
use ZeroBounce\Api;
use ZeroBounce\HttpClient\HttpClient;

/**
 * Class Base
 * @package ZeroBounce\Test
 */
class Base extends TestCase
{
    /**
     * @var Api
     */
    protected $api;

    /**
     * @throws \ErrorException
     * @throws \ZeroBounce\Exception\ErrorException
     */
    public function setUp()
    {
        $apiKey = getenv('ZEROBOUNCE_API_KEY');
        if (empty($apiKey)) {
            throw new \ErrorException('Please provider the right api key by setting you ZEROBOUNCE_API_KEY environment variable!');
        }
        
        /** @var HttpClient $client */
        $client = new HttpClient($apiKey);
        
        /** @var Api api */
        $this->api = new Api($client);

        parent::setUp();
    }
}
