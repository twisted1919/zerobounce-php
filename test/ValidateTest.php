<?php declare(strict_types=1);

namespace ZeroBounce\Test;

use ZeroBounce\Response\ValidateResponse;

/**
 * Class ValidateTest
 * @package ZeroBounce\Test
 * @see https://www.zerobounce.net/docs/email-validation-api-quickstart/#sandbox_mode__v2__
 */
class ValidateTest extends Base
{
    /**
     * @throws \ZeroBounce\Exception\ClientException
     */
    final public function testValid(): void
    {
        /** @var ValidateResponse $response */
        $response = $this->api->validate('valid@example.com');
        $this->assertInstanceOf(ValidateResponse::class, $response);
        $this->assertTrue($response->isValid());
    }

    /**
     * @throws \ZeroBounce\Exception\ClientException
     */
    final public function testInvalid(): void
    {
        /** @var ValidateResponse $response */
        $response = $this->api->validate('invalid@example.com');

        $this->assertInstanceOf(ValidateResponse::class, $response);
        $this->assertTrue($response->isInvalid());
    }

    /**
     * @throws \ZeroBounce\Exception\ClientException
     */
    final public function testCatchAll(): void
    {
        /** @var ValidateResponse $response */
        $response = $this->api->validate('catch_all@example.com');
        
        $this->assertInstanceOf(ValidateResponse::class, $response);
        $this->assertTrue($response->isCatchAll());
    }

    /**
     * @throws \ZeroBounce\Exception\ClientException
     */
    final public function testDoNotEmail(): void
    {
        /** @var ValidateResponse $response */
        $response = $this->api->validate('donotmail@example.com');

        $this->assertInstanceOf(ValidateResponse::class, $response);
        $this->assertTrue($response->isDoNotEmail());
    }

    /**
     * @throws \ZeroBounce\Exception\ClientException
     */
    final public function testUnknown(): void
    {
        /** @var ValidateResponse $response */
        $response = $this->api->validate('unknown@example.com');

        $this->assertInstanceOf(ValidateResponse::class, $response);
        $this->assertTrue($response->isUnknown());
    }
}
