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
     * @return string
     */
    public function getUrl(): string ;

    /**
     * @return string
     */
    public function __toString(): string ;
}