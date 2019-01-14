<?php

namespace OpenWeatherMapApi\Data\DataItem;

use OpenWeatherMapApi\PropertyInitializer\AbstractInitializer;

/**
 * Class Clouds
 * @package OpenWeatherMapApi\Data
 */
class Clouds extends AbstractInitializer
{
    /**
     * @var int
     */
    protected $all;

    /**
     * @var array
     */
    protected static $initPropertiesMap = [
        'all' => 'all'
    ];

    /**
     * @return int
     */
    public function getAll(): int
    {
        return $this->all;
    }
}