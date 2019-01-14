<?php

namespace OpenWeatherMapApi;

/**
 * Interface UrlInterface
 * @package OpenWeatherMapApi
 */
interface UrlInterface
{
    /**
     * @param string $appId
     *
     * @return Url
     */
    public function setAppId(string $appId): Url ;

    /**
     * @param string $type
     *
     * @return Url
     * @throws \Exception
     */
    public function setType(string $type): Url ;

    /**
     * @param City $city
     *
     * @return string
     */
    public function getUrl(City $city): string ;
}