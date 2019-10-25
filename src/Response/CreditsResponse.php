<?php declare(strict_types=1);

namespace ZeroBounce\Response;

/**
 * Class CreditsResponse
 * @package ZeroBounce\Response
 */
class CreditsResponse extends Response
{
    /**
     * @return int
     */
    public function getCredits(): int
    {
        /** @var int $credits */
        $credits = (int)($this->getResponseData()['Credits'] ?? 0);
        
        return $credits;
    }
}
