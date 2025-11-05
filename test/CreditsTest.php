<?php

declare(strict_types=1);

namespace ZeroBounce\Test;

use ZeroBounce\Response\CreditsResponse;

/**
 * Class CreditsTest
 * @package ZeroBounce\Test
 */
class CreditsTest extends Base
{
    /**
     * @throws \ZeroBounce\Exception\ClientException
     */
    final public function testCredits(): void
    {
        $response = $this->api->credits();

        $this->assertGreaterThanOrEqual(0, $response->getCredits());
    }
}
