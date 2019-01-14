<?php

namespace OpenWeatherMapApi\Data;

/**
 * Class Coord
 * @package OpenWeatherMapApi\Weather
 */
class Coord
{
    /**
     * @var float
     */
    private $latitude = 0.0;

    /**
     * @var float
     */
    private $longitude = 0.0;

    /**
     * Coord constructor.
     *
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude  = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }
}