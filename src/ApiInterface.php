<?php declare(strict_types=1);

namespace ZeroBounce;

use ZeroBounce\Response\CreditsResponse;
use ZeroBounce\Response\ValidateResponse;

/**
 * Interface ApiInterface
 * @package ZeroBounce
 */
interface ApiInterface
{
    /**
     * @param string $email
     * @param string $ipAddress
     *
     * @return ValidateResponse
     */
    public function validate(string $email, string $ipAddress = ''): ValidateResponse;

    /**
     * @return CreditsResponse
     */
    public function credits(): CreditsResponse;
}
