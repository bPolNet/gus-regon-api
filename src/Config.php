<?php

declare(strict_types=1);

namespace Primotly\GusRegonApi;

class Config
{
    /**
     * @var string|null
     */
    private $apiKey;

    public function __construct(?string $apiKey = null)
    {
        $this->apiKey = $apiKey;
    }

    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }
}
