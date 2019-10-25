<?php declare(strict_types=1);

namespace ZeroBounce\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
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
    protected $client;

    /**
     * @var string
     */
    protected $apiKey = '';

    /**
     * @var array
     */
    private static $options = [
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
     * @param array $params
     *
     * @return HttpResponseInterface
     * @throws ClientException
     */
    public function get(string $path = '', array $params = []): HttpResponseInterface
    {
        try {
            $response = $this->client->get($path, $this->mergeDefaultParams($params));
            $response = new HttpResponse((string)$response->getBody(), (int)$response->getStatusCode(), (array)$response->getHeaders());
        } catch (BadResponseException $e) {
            throw new ClientException($e->getMessage(), $e->getCode());
        }

        return $response;
    }
}
