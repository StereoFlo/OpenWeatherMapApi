<?php

namespace OpenWeatherMapApi;

/**
 * Class City
 * @package OpenWeatherMapApi
 */
class City
{
    /**
     * @var string|null
     */
    private $query;

    /**
     * @var int|null
     */
    private $id;

    /**
     * City constructor.
     *
     * @param string|null $query
     * @param int|null    $id
     */
    public function __construct(?string $query, ?int $id)
    {
        $this->query = $query;
        $this->id    = $id;
    }

    /**
     * @return null|string
     */
    public function getQuery(): ?string
    {
        return $this->query;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}
