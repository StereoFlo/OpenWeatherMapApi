<?php

namespace OpenWeatherMapApi\Data;

/**
 * Class Visibility
 * @package OpenWeatherMapApi\Data
 */
class Visibility
{
    /**
     * @var int
     */
    private $value;

    /**
     * Visibility constructor.
     *
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}