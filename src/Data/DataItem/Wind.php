<?php

namespace OpenWeatherMapApi\Data\DataItem;

use Initializer\AbstractInitializer;

/**
 * Class Wind
 * @package OpenWeatherMapApi\Data
 */
class Wind extends AbstractInitializer
{
    protected static $initPropertiesMap = [
        'speed' => 'speed',
        'deg'   => 'deg',
    ];

    /**
     * @var int
     */
    protected $speed;
    /**
     * @var int
     */
    protected $deg;

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @return int
     */
    public function getDeg(): int
    {
        return $this->deg;
    }
}
