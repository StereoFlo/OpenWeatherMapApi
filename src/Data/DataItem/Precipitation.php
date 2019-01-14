<?php

namespace OpenWeatherMapApi\Data\DataItem;

use OpenWeatherMapApi\PropertyInitializer\AbstractInitializer;

/**
 * Class Precipitation
 * @package OpenWeatherMapApi\Data
 */
abstract class Precipitation extends AbstractInitializer implements PrecipitationInterface
{
    const TYPE = '';

    /**
     * @var int
     */
    protected $oneHour;

    /**
     * @var int
     */
    protected $threeHour;

    /**
     * @var array
     */
    protected static $initPropertiesMap = [
        '1h' => 'oneHour',
        '3h' => 'threeHour',
    ];

    /**
     * @return string
     */
    public function getType(): string
    {
        return static::TYPE;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->oneHour) && empty($this->threeHour);
    }
}