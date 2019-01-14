<?php

namespace OpenWeatherMapApi\Data\DataItem;

use OpenWeatherMapApi\PropertyInitializer\AbstractInitializer;

/**
 * Class Sys
 * @package OpenWeatherMapApi\Data
 */
class Sys extends AbstractInitializer
{
    /**
     * @var array
     */
    protected static $initPropertiesMap = [
        'country' => 'country',
        'sunrise' => 'sunrise',
        'sunset'  => 'sunset',
    ];

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $sunrise;

    /**
     * @var string
     */
    protected $sunset;

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