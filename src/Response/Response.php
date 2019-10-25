<?php declare(strict_types=1);

namespace ZeroBounce\Response;

use ZeroBounce\HttpClient\HttpResponse;

/**
 * Class Response
 * @package ZeroBounce\Response
 */
class Response extends HttpResponse
{
    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->getResponseData()['error'] ?? '';
    }

    /**
     * @return bool
     */
    public function hasError(): bool
    {
        return strlen($this->getError()) > 0;
    }
}
