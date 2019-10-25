<?php declare(strict_types=1);

namespace ZeroBounce;

use ZeroBounce\HttpClient\HttpClient;
use ZeroBounce\HttpClient\HttpResponse;
use ZeroBounce\Response\CreditsResponse;
use ZeroBounce\Response\ValidateResponse;

/**
 * Class Api
 * @package ZeroBounce
 */
class Api implements ApiInterface
{
    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $email
     * @param string $ipAddress
     *
     * @return ValidateResponse
     * @throws Exception\ClientException
     */
    public function validate(string $email, string $ipAddress = ''): ValidateResponse
    {
        /** @var HttpResponse $response */
        $response = $this->httpClient->get('validate', [
            'query' => [
                'email'      => $email,
                'ip_address' => $ipAddress,
            ]
        ]);
        
        /** @var ValidateResponse $response */
        $response = ValidateResponse::fromResponse($response);
        
        return $response;
    }

    /**
     * @return CreditsResponse
     * @throws Exception\ClientException
     */
    public function credits(): CreditsResponse
    {
        /** @var HttpResponse $response */
        $response = $this->httpClient->get('getcredits');

        /** @var CreditsResponse $response */
        $response = CreditsResponse::fromResponse($response);
        
        return $response;
    }
}
