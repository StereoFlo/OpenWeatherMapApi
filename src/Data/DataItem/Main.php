<?php

namespace OpenWeatherMapApi\Data\DataItem;

/**
 * Class Main
 * @package OpenWeatherMapApi\Data
 */
class Main
{
    /**
     * @var float
     */
    private $temp;

    /**
     * @var float
     */
    private $pressure;

    /**
     * @var float
     */
    private $humidity;

    /**
     * @var float
     */
    private $tempMax;

    /**
     * @var float
     */
    private $tempMin;

    /**
     * Main constructor.
     *
     * @param float $temp
     * @param float $pressure
     * @param float $humidity
     * @param float $tempMax
     * @param float $tempMin
     */
    public function __construct(float $temp, float $pressure, float $humidity, float $tempMax, float $tempMin)
    {
        $this->temp     = $temp;
        $this->pressure = $pressure;
        $this->humidity = $humidity;
        $this->tempMax  = $tempMax;
        $this->tempMin  = $tempMin;
    }

    /**
     * @return float
     */
    public function getTemp(): float
    {
        return $this->temp;
    }

    /**
     * @return float
     */
    public function getPressure(): float
    {
        return $this->pressure;
    }

    /**
     * @return float
     */
    public function getHumidity(): float
    {
        return $this->humidity;
    }

    /**
     * @return float
     */
    public function getTempMax(): float
    {
        return $this->tempMax;
    }

    /**
     * @return float
     */
    public function getTempMin(): float
    {
        return $this->tempMin;
    }
}