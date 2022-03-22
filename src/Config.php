<?php

declare(strict_types=1);

namespace Primotly\GusRegonApi;

class Config
{
    private const TEST_API_KEY = 'abcde12345abcde12345';

    /**
     * @var string|null
     */
    private $apiKey;

    /**
     * @var bool
     */
    private $isDev = false;

    public function __construct(?string $apiKey = null)
    {
        if (null === $apiKey) {
            $this->apiKey = self::TEST_API_KEY;
            $this->isDev = true;
        } else {
            $this->apiKey = $apiKey;
        }
    }

    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }

    public function isDev(): bool
    {
        return $this->isDev;
    }
}
