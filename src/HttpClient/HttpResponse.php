<?php

declare(strict_types=1);

namespace ZeroBounce\HttpClient;

/**
 * Class HttpResponse
 * @package ZeroBounce\HttpClient
 */
class HttpResponse implements HttpResponseInterface
{
    /**
     * @var string
     */
    private $body = '';

    /**
     * @var int
     */
    private $code = 200;

    /**
     * @var array
     *
     * @phpstan-ignore-next-line missingType.iterableValue
     */
    private $headers = [];

    /**
     * @var array
     *
     * @phpstan-ignore-next-line missingType.iterableValue
     */
    private $responseData = [];

    /**
     * @param string $body
     * @param int $code
     * @param array $headers
     *
     * @phpstan-ignore-next-line missingType.iterableValue
     */
    public function __construct(string $body, int $code, array $headers = [])
    {
        $this->body    = $body;
        $this->code    = $code;
        $this->headers = $headers;

        $this->responseData = (array)json_decode($this->body, true);
    }

    /**
     * @param HttpResponseInterface $response
     *
     * @return HttpResponseInterface
     */
    public static function fromResponse(HttpResponseInterface $response): HttpResponseInterface
    {
        /** @phpstan-ignore-next-line missingType.iterableValue */
        return new static($response->getBody(), $response->getCode(), $response->getHeaders());
    }

    /**
     * @return array
     *
     * @phpstan-ignore-next-line missingType.iterableValue
     */
    public function getResponseData(): array
    {
        return (array)$this->responseData;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return (string)$this->body;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return (int)$this->code;
    }

    /**
     * @return array
     *
     * @phpstan-ignore-next-line missingType.iterableValue
     */
    public function getHeaders(): array
    {
        return (array)$this->headers;
    }
}
