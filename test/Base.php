<?php

declare(strict_types=1);

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
    public function setUp(): void
    {
        $apiKey = getenv('ZEROBOUNCE_API_KEY');
        if (empty($apiKey)) {
            throw new \ErrorException('Please provider the right api key by setting you ZEROBOUNCE_API_KEY environment variable!');
        }

        $this->api = new Api(new HttpClient($apiKey));

        parent::setUp();
    }
}
