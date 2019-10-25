<?php declare(strict_types=1);

namespace ZeroBounce\HttpClient;

/**
 * Interface HttpResponseInterface
 * @package ZeroBounce\HttpClient
 */
interface HttpResponseInterface
{
    /**
     * @param HttpResponseInterface $response
     *
     * @return HttpResponseInterface
     */
    public static function fromResponse(HttpResponseInterface $response): HttpResponseInterface;

    /**
     * @return array
     */
    public function getResponseData(): array;

    /**
     * @return string
     */
    public function getBody(): string;

    /**
     * @return int
     */
    public function getCode(): int;

    /**
     * @return array
     */
    public function getHeaders(): array;
}
