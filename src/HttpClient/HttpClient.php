<?php

declare(strict_types=1);

namespace ZeroBounce\HttpClient;

use GuzzleHttp\Client;
use ZeroBounce\Exception\ClientException;
use ZeroBounce\Exception\ErrorException;

/**
 * Class HttpClient
 * @package ZeroBounce\HttpClient
 */
class HttpClient implements HttpClientInterface
{
    /**
     * @var Client
     */
    protected Client $client;

    /**
     * @var string
     */
    protected string $apiKey = '';

    /**
     * @var array
     *
     * @phpstan-ignore-next-line missingType.iterableValue
     */
    private static array $options = [
        'base_uri' => 'https://api.zerobounce.net/v2/',
        'headers'  => [
            'user-agent' => 'zerobounce-php/1.0.0 (https://github.com/twisted1919/zerobounce-php)'
        ],
    ];

    /**
     * @param string $apiKey
     * @param array $options
     *
     * @throws ErrorException
     *
     * @phpstan-ignore-next-line missingType.iterableValue
     */
    public function __construct(string $apiKey = '', array $options = [])
    {
        if (empty($apiKey)) {
            throw new ErrorException('Please provide a valid api key!');
        }

        $this->apiKey = $apiKey;
        $this->client = new Client(array_merge_recursive(self::$options, $options));
    }

    /**
     * @param array $params
     *
     * @return array
     *
     * @phpstan-ignore-next-line missingType.iterableValue
     */
    protected function mergeDefaultParams(array $params = []): array
    {
        return array_merge_recursive([
            'query' => [
                'api_key' => $this->apiKey
            ]
        ], $params);
    }

    /**
     * @param string $path
     * @param array $options
     *
     * @return HttpResponseInterface
     * @throws ClientException
     *
     * @phpstan-ignore-next-line missingType.iterableValue
     */
    public function get(string $path = '', array $options = []): HttpResponseInterface
    {
        try {
            $response = $this->client->get($path, $this->mergeDefaultParams($options));
            $response = new HttpResponse((string)$response->getBody(), (int)$response->getStatusCode(), (array)$response->getHeaders());
        } catch (\Throwable $e) {
            throw new ClientException($e->getMessage(), $e->getCode());
        }

        return $response;
    }
}
