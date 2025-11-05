<?php

declare(strict_types=1);

namespace ZeroBounce\Test;

use ZeroBounce\Exception\ClientException;
use ZeroBounce\Response\ValidateResponse;

/**
 * Class ValidateTest
 * @package ZeroBounce\Test
 * @see https://www.zerobounce.net/docs/email-validation-api-quickstart/#sandbox_mode__v2__
 */
class ValidateTest extends Base
{
    /**
     * @throws ClientException
     */
    final public function testValid(): void
    {
        $response = $this->api->validate('valid@example.com');

        $this->assertTrue($response->isValid());
    }

    /**
     * @throws ClientException
     */
    final public function testInvalid(): void
    {
        $response = $this->api->validate('invalid@example.com');

        $this->assertTrue($response->isInvalid());
    }

    /**
     * @throws ClientException
     */
    final public function testCatchAll(): void
    {
        $response = $this->api->validate('catch_all@example.com');

        $this->assertTrue($response->isCatchAll());
    }

    /**
     * @throws ClientException
     */
    final public function testDoNotEmail(): void
    {
        $response = $this->api->validate('donotmail@example.com');

        $this->assertTrue($response->isDoNotEmail());
    }

    /**
     * @throws ClientException
     */
    final public function testUnknown(): void
    {
        $response = $this->api->validate('unknown@example.com');

        $this->assertTrue($response->isUnknown());
    }
}
