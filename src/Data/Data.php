<?php

namespace OpenWeatherMapApi\Data;

use OpenWeatherMapApi\Data\DataItem\Clouds;
use OpenWeatherMapApi\Data\DataItem\Coord;
use OpenWeatherMapApi\Data\DataItem\Main;
use OpenWeatherMapApi\Data\DataItem\PrecipitationInterface;
use OpenWeatherMapApi\Data\DataItem\Rain;
use OpenWeatherMapApi\Data\DataItem\Snow;
use OpenWeatherMapApi\Data\DataItem\Sys;
use OpenWeatherMapApi\Data\DataItem\Visibility;
use OpenWeatherMapApi\Data\DataItem\Wind;
use OpenWeatherMapApi\Data\Weather\WeatherItem;

/**
 * Class Data
 * @package OpenWeatherMapApi\Data
 */
class Data
{
    /**
     * @var Clouds
     */
    private $clouds;

    /**
     * @var Coord
     */
    private $coord;

    /**
     * @var Main
     */
    private $main;

    /**
     * @var Snow
     */
    private $snow;

    /**
     * @var Rain
     */
    private $rain;

    /**
     * @var Sys
     */
    private $sys;

    /**
     * @var Visibility
     */
    private $visibility;

    /**
     * @var Wind
     */
    private $wind;

    /**
     * @var WeatherItem[]
     */
    private $weather;

    /**
     * @return Clouds
     */
    public function getClouds(): Clouds
    {
        return $this->clouds;
    }

    /**
     * @param Clouds $clouds
     *
     * @return Data
     */
    public function setClouds(Clouds $clouds): Data
    {
        $this->clouds = $clouds;
        return $this;
    }

    /**
     * @return Coord
     */
    public function getCoord(): Coord
    {
        return $this->coord;
    }

    /**
     * @param Coord $coord
     *
     * @return Data
     */
    public function setCoord(Coord $coord): Data
    {
        $this->coord = $coord;
        return $this;
    }

    /**
     * @return Main
     */
    public function getMain(): Main
    {
        return $this->main;
    }

    /**
     * @param Main $main
     *
     * @return Data
     */
    public function setMain(Main $main): Data
    {
        $this->main = $main;
        return $this;
    }

    /**
     * @return Snow
     */
    public function getSnow(): Snow
    {
        return $this->snow;
    }

    /**
     * @param PrecipitationInterface $snow
     *
     * @return Data
     */
    public function setSnow(PrecipitationInterface $snow): Data
    {
        $this->snow = $snow;
        return $this;
    }

    /**
     * @return Rain
     */
    public function getRain(): Rain
    {
        return $this->rain;
    }

    /**
     * @param PrecipitationInterface $rain
     *
     * @return Data
     */
    public function setRain(PrecipitationInterface $rain): Data
    {
        $this->rain = $rain;
        return $this;
    }

    /**
     * @return Sys
     */
    public function getSys(): Sys
    {
        return $this->sys;
    }

    /**
     * @param Sys $sys
     *
     * @return Data
     */
    public function setSys(Sys $sys): Data
    {
        $this->sys = $sys;
        return $this;
    }

    /**
     * @return Visibility
     */
    public function getVisibility(): Visibility
    {
        return $this->visibility;
    }

    /**
     * @param Visibility $visibility
     *
     * @return Data
     */
    public function setVisibility(Visibility $visibility): Data
    {
        $this->visibility = $visibility;
        return $this;
    }

    /**
     * @return Wind
     */
    public function getWind(): Wind
    {
        return $this->wind;
    }

    /**
     * @param Wind $wind
     *
     * @return Data
     */
    public function setWind(Wind $wind): Data
    {
        $this->wind = $wind;
        return $this;
    }

    /**
     * @return WeatherItem[]
     */
    public function getWeather(): array
    {
        return $this->weather;
    }

    /**
     * @param WeatherItem $weather
     *
     * @return Data
     */
    public function setWeather(WeatherItem $weather): Data
    {
        $this->weather[] = $weather;
        return $this;
    }
}