<?php

namespace OpenWeatherMapApi\Data\PropertyInitializer;

/**
 * Class AbstractInitializer
 * @package OpenWeatherMapApi\Data\PropertyInitializer
 */
abstract class AbstractInitializer implements \ArrayAccess
{
    use InitializerTrait, ArrayLikeTrait;

    /**
     * @var array
     */
    protected static $initPropertiesMap = [];

    /**
     * @return array
     */
    public static function getColumns()
    {
        return \array_keys(static::$initPropertiesMap);
    }
}