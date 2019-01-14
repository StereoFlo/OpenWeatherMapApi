<?php

namespace OpenWeatherMapApi\Data\DataItem;

/**
 * Class Sys
 * @package OpenWeatherMapApi\Data
 */
class Sys
{
    /**
     * @var string
     */
    private $country;
    /**
     * @var string
     */
    private $sunrise;
    /**
     * @var string
     */
    private $sunset;

    /**
     * Sys constructor.
     *
     * @param string $country
     * @param string $sunrise
     * @param string $sunset
     */
    public function __construct(string $country, string $sunrise, string $sunset)
    {
        $this->country = $country;
        $this->sunrise = $sunrise;
        $this->sunset = $sunset;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getSunrise(): string
    {
        return $this->sunrise;
    }

    /**
     * @return string
     */
    public function getSunset(): string
    {
        return $this->sunset;
    }
}