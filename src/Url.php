<?php

namespace OpenWeatherMapApi;

/**
 * Class Url
 * @package OpenWeatherMapApi
 */
class Url implements UrlInterface
{
    const TYPE_WEATHER = 'weather';
    const TYPE_FORECAST = 'forecast';
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
        if (!\in_array($type, [self::TYPE_FORECAST, self::TYPE_WEATHER])) {
            throw new \Exception('the type is wrong: ' . $type);
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @param City $city
     *
     * @return string
     */
    public function getUrl(City $city): string
    {
        if ($city->getId()) {
            return \sprintf(self::URL_PATTERN, $this->type, 'id', $city->getId(), $this->appId);
        }
        return \sprintf(self::URL_PATTERN, $this->type, 'q', $city->getQuery(), $this->appId);
    }
}