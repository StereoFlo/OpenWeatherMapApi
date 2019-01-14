<?php

namespace OpenWeatherMapApi\Data;

use OpenWeatherMapApi\Data\DataItem\Clouds;
use OpenWeatherMapApi\Data\DataItem\Coord;
use OpenWeatherMapApi\Data\DataItem\Main;
use OpenWeatherMapApi\Data\DataItem\Rain;
use OpenWeatherMapApi\Data\DataItem\Snow;
use OpenWeatherMapApi\Data\DataItem\Sys;
use OpenWeatherMapApi\Data\DataItem\Weather\WeatherItem;
use OpenWeatherMapApi\Data\DataItem\Wind;
use OpenWeatherMapApi\PropertyInitializer\AbstractInitializer;

/**
 * Class Data
 * @package OpenWeatherMapApi\Data
 */
class Data extends AbstractInitializer
{
    /**
     * @var Clouds
     */
    protected $clouds;

    /**
     * @var Coord
     */
    protected $coord;

    /**
     * @var Main
     */
    protected $main;

    /**
     * @var Snow
     */
    protected $snow;

    /**
     * @var Rain
     */
    protected $rain;

    /**
     * @var Sys
     */
    protected $sys;

    /**
     * @var int
     */
    protected $visibility;

    /**
     * @var Wind
     */
    protected $wind;

    /**
     * @var WeatherItem[]
     */
    protected $weather;

    /**
     * @return Clouds
     */
    public function getClouds(): Clouds
    {
        return $this->clouds;
    }

    /**
     * @return Coord
     */
    public function getCoord(): Coord
    {
        return $this->coord;
    }

    /**
     * @return Main
     */
    public function getMain(): Main
    {
        return $this->main;
    }

    /**
     * @return Snow
     */
    public function getSnow(): Snow
    {
        return $this->snow;
    }

    /**
     * @return Rain
     */
    public function getRain(): Rain
    {
        return $this->rain;
    }

    /**
     * @return Sys
     */
    public function getSys(): Sys
    {
        return $this->sys;
    }

    /**
     * @return int
     */
    public function getVisibility(): int
    {
        return $this->visibility;
    }

    /**
     * @return Wind
     */
    public function getWind(): Wind
    {
        return $this->wind;
    }

    /**
     * @return WeatherItem[]
     */
    public function getWeather(): array
    {
        return $this->weather;
    }

    /**
     * @param $val
     * @param $prop
     *
     * @return $this
     */
    protected function initPropertiesCustom($val, $prop): self
    {
        switch ($prop) {
            case 'coord':
                $this->coord = Coord::create($val);
                break;
            case 'weather':
                if (\is_array($val)) {
                    foreach ($val as $weatherItem) {
                        $this->weather[] = WeatherItem::create($weatherItem);
                    }
                }
                break;
            case 'main':
                $this->main = Main::create($val);
                break;
            case 'wind':
                $this->wind = Wind::create($val);
                break;
            case 'clouds':
                $this->clouds = Clouds::create($val);
                break;
            case 'rain':
                $this->rain = Rain::create($val);
                break;
            case 'snow':
                $this->snow = Snow::create($val);
                break;
            case 'sys':
                $this->sys = Sys::create($val);
                break;
            case 'visibility':
                $this->visibility = $val;
                break;
        }

        return $this;
    }
}