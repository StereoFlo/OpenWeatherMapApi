<?php

namespace OpenWeatherMapApi\Data\DataItem;

/**
 * Class Wind
 * @package OpenWeatherMapApi\Data
 */
class Wind
{
    /**
     * @var int
     */
    private $speed;
    /**
     * @var int
     */
    private $deg;

    /**
     * Wind constructor.
     *
     * @param int $speed
     * @param int $deg
     */
    public function __construct(int $speed, int $deg)
    {
        $this->speed = $speed;
        $this->deg = $deg;
    }

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