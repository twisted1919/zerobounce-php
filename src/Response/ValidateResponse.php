<?php declare(strict_types=1);

namespace ZeroBounce\Response;

/**
 * Class ValidateResponse
 * @package ZeroBounce\Response
 */
class ValidateResponse extends Response
{
    /**
     * @param string $status
     *
     * @return bool
     */
    protected function statusIs(string $status): bool
    {
        /** @var string $returnedStatus */
        $returnedStatus = $this->getResponseData()['status'] ?? '';
        
        return $returnedStatus === $status;
    }
    
    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->statusIs('valid');
    }

    /**
     * @return bool
     */
    public function isInvalid(): bool
    {
        return $this->statusIs('invalid');
    }

    /**
     * @return bool
     */
    public function isCatchAll(): bool
    {
        return $this->statusIs('catch-all');
    }

    /**
     * @return bool
     */
    public function isUnknown(): bool
    {
        return $this->statusIs('unknown');
    }

    /**
     * @return bool
     */
    public function isSpamTrap(): bool
    {
        return $this->statusIs('spamtrap');
    }

    /**
     * @return bool
     */
    public function isAbuse(): bool
    {
        return $this->statusIs('abuse');
    }

    /**
     * @return bool
     */
    public function isDoNotEmail(): bool
    {
        return $this->statusIs('do_not_mail');
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->getResponseData()['domain'] ?? '';
    }

    /**
     * @return bool
     */
    public function isFreeEmail(): bool
    {
        $isFreeEmail = $this->getResponseData()['free_email'] ?? false;
        return $isFreeEmail === true || (int)$isFreeEmail === 1 || $isFreeEmail === 'true';
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->getResponseData()['address'] ?? '';
    }
}
