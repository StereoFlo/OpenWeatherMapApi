<?php

namespace OpenWeatherMapApi\Data\DataItem\Weather;

use OpenWeatherMapApi\PropertyInitializer\AbstractInitializer;

/**
 * Class WeatherItem
 * @package OpenWeatherMapApi\Data\Weather
 */
class WeatherItem extends AbstractInitializer
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $main;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $icon;

    /**
     * @var array
     */
    protected static $initPropertiesMap = [
        'id'          => 'id',
        'main'        => 'main',
        'description' => 'description',
        'icon'        => 'icon',
    ];

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
    public function getMain(): string
    {
        return $this->main;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }
}