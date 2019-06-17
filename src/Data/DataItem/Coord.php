<?php

namespace OpenWeatherMapApi\Data\DataItem;

use Initializer\AbstractInitializer;

/**
 * Class Coord
 * @package OpenWeatherMapApi\Weather
 */
class Coord extends AbstractInitializer
{
    /**
     * @var float
     */
    protected $latitude = 0.0;

    /**
     * @var float
     */
    protected $longitude = 0.0;

    /**
     * @var array
     */
    protected static $initPropertiesMap = [
        'lon' => 'longitude',
        'lat' => 'latitude'
    ];

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
