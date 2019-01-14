<?php

namespace OpenWeatherMapApi;

/**
 * Class OpenWeatherMap
 * @package OpenWeatherMapApi
 */
class OpenWeatherMap
{
    /**
     * @var Credential
     */
    private $credential;

    /**
     * OpenWeatherMap constructor.
     *
     * @param Credential $credential
     */
    public function __construct(Credential $credential)
    {
        $this->credential = $credential;
    }
}