<?php declare(strict_types=1);

namespace ZeroBounce\Exception;

/**
 * Class ClientException
 * @package ZeroBounce\Exception
 */
class ClientException extends \ErrorException
{
    /**
     * @var int|null
     */
    public $code = null;

    /**
     * ClientException constructor.
     *
     * @param string $message
     * @param int $code
     */
    public function __construct($message, $code)
    {
        $this->code = $code;
        parent::__construct($message, $code);
    }
}
