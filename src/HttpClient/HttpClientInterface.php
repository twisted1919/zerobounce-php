<?php

declare(strict_types=1);

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
     *
     * @phpstan-ignore-next-line missingType.iterableValue
     */
    public function get(string $path = '', array $options = []): HttpResponseInterface;
}
