<?php

namespace OpenWeatherMapApi\Data\Weather;

/**
 * Class WeatherItem
 * @package OpenWeatherMapApi\Data\Weather
 */
class WeatherItem
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $main;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $icon;

    /**
     * WeatherItem constructor.
     *
     * @param int    $id
     * @param string $main
     * @param string $description
     * @param string $icon
     */
    public function __construct(int $id, string $main, string $description, string $icon)
    {
        $this->id          = $id;
        $this->main        = $main;
        $this->description = $description;
        $this->icon        = $icon;
    }

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