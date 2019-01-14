<?php

namespace OpenWeatherMapApi\Data;

/**
 * Class Clouds
 * @package OpenWeatherMapApi\Data
 */
class Clouds
{
    /**
     * @var int
     */
    private $all;

    /**
     * Clouds constructor.
     *
     * @param int $all
     */
    public function __construct(int $all)
    {
        $this->all = $all;
    }

    /**
     * @return int
     */
    public function getAll(): int
    {
        return $this->all;
    }
}