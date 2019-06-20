<?php

namespace OpenWeatherMapApi\Data\DataItem;

use Initializer\AbstractInitializer;

/**
 * Class Sys
 * @package OpenWeatherMapApi\Data
 */
class Sys extends AbstractInitializer
{
    /**
     * @var array
     */
    protected static $initPropertiesMap = [
        'id'      => 'id',
        'type'    => 'type',
        'country' => 'country',
        'sunrise' => 'sunrise',
        'sunset'  => 'sunset',
    ];

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $sunrise;

    /**
     * @var string
     */
    protected $sunset;

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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getSunrise(): string
    {
        return $this->sunrise;
    }

    /**
     * @return string
     */
    public function getSunset(): string
    {
        return $this->sunset;
    }
}
