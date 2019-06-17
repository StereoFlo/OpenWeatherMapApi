<?php

namespace OpenWeatherMapApi\Data\DataItem;

use Initializer\AbstractInitializer;

/**
 * Class Main
 * @package OpenWeatherMapApi\Data
 */
class Main extends AbstractInitializer
{
    /**
     * @var float
     */
    protected $temp;

    /**
     * @var float
     */
    protected $pressure;

    /**
     * @var float
     */
    protected $humidity;

    /**
     * @var float
     */
    protected $tempMax;

    /**
     * @var float
     */
    protected $tempMin;

    /**
     * @var array
     */
    protected static $initPropertiesMap = [
        'temp'     => 'temp',
        'pressure' => 'pressure',
        'humidity' => 'humidity',
        'temp_max' => 'tempMax',
        'temp_min' => 'tempMin',
    ];

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
