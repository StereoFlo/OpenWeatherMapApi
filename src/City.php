<?php

namespace OpenWeatherMapApi;

/**
 * Class City
 * @package OpenWeatherMapApi
 */
class City
{
    /**
     * @var string
     */
    private $query;

    /**
     * @var int
     */
    private $id;

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     *
     * @return City
     */
    public function setQuery(string $query): City
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return City
     */
    public function setId(int $id): City
    {
        $this->id = $id;
        return $this;
    }
}