<?php declare(strict_types=1);

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
        /** @var CreditsResponse $response */
        $response = $this->api->credits();

        $this->assertInstanceOf(CreditsResponse::class, $response);
        $this->assertIsInt($response->getCredits());
    }
}
