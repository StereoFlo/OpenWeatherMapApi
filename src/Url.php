<?php

namespace OpenWeatherMapApi;

/**
 * Class Url
 * @package OpenWeatherMapApi
 */
class Url implements UrlInterface
{
    const TYPE_WEATHER = 'weather';
    const TYPE_FORECAST5 = 'forecast';
    const TYPE_FORECAST16 = 'forecast/daily';
    const URL_PATTERN = 'https://api.openweathermap.org/data/2.5/%s?%s=%s&appid=%s';

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $appId;

    /**
     * @var City
     */
    private $city;

    /**
     * @param string $appId
     *
     * @return Url
     */
    public function setAppId(string $appId): Url
    {
        $this->appId = $appId;
        return $this;
    }

    /**
     * @param string $type
     *
     * @return Url
     * @throws \Exception
     */
    public function setType(string $type): Url
    {
        if (!\in_array($type, [self::TYPE_FORECAST5, self::TYPE_WEATHER, self::TYPE_FORECAST16])) {
            throw new \Exception('the type is wrong: ' . $type);
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @param City $city
     *
     * @return Url
     */
    public function setCity(City $city): Url
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        if ($this->city->getId()) {
            return \sprintf(self::URL_PATTERN, $this->type, 'id', $this->city->getId(), $this->appId);
        }
        return \sprintf(self::URL_PATTERN, $this->type, 'q', $this->city->getQuery(), $this->appId);
    }
}
