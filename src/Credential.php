<?php

namespace OpenWeatherMapApi;

/**
 * Class Credential
 * @package OpenWeatherMapApi
 */
class Credential
{
    /**
     * @var string
     */
    private $appId;

    /**
     * Credential constructor.
     *
     * @param string $appId
     */
    public function __construct(string $appId)
    {
        $this->appId = $appId;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getAppId();
    }
}