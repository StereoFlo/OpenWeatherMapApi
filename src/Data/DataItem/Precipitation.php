<?php

namespace OpenWeatherMapApi\Data\DataItem;

/**
 * Class Precipitation
 * @package OpenWeatherMapApi\Data
 */
abstract class Precipitation implements PrecipitationInterface
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
     * Precipitation constructor.
     *
     * @param int $oneHour
     * @param int $theeHour
     */
    public function __construct(int $oneHour, int $theeHour)
    {
        $this->oneHour   = $oneHour;
        $this->threeHour = $theeHour;
    }

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