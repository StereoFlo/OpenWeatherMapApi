<?php

namespace OpenWeatherMapApi\Data;

/**
 * Interface PrecipitationInterface
 * @package OpenWeatherMapApi\Data
 */
interface PrecipitationInterface
{
    /**
     * @return string
     */
    public function getType(): string ;

    /**
     * @return bool
     */
    public function isEmpty(): bool ;
}