<?php

namespace OpenWeatherMapApi\Data;

use Initializer\AbstractInitializer;

/**
 * Class City
 * @package OpenWeatherMapApi\Data
 */
class City extends AbstractInitializer
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
