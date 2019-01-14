<?php

namespace OpenWeatherMapApi\Data\DataItem;

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