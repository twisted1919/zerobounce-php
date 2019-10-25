<?php declare(strict_types=1);

namespace ZeroBounce\HttpClient;

/**
 * Interface HttpClientInterface
 * @package ZeroBounce\HttpClient
 */
interface HttpClientInterface
{
    /**
     * @param string $path
     * @param array $options
     *
     * @return HttpResponseInterface
     */
    public function get(string $path = '', array $options = []): HttpResponseInterface;
}
