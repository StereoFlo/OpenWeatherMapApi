<?php

namespace OpenWeatherMapApi;

use GuzzleHttp\ClientInterface;
use OpenWeatherMapApi\Data\Data;

/**
 * Class OpenWeatherMap
 * @package OpenWeatherMapApi
 */
class OpenWeatherMap
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var City
     */
    private $city;

    /**
     * @var int
     */
    private $count = 0;

    /**
     * @var Data[]
     */
    private $stack = [];

    /**
     * @var UrlInterface
     */
    private $url;

    /**
     * OpenWeatherMap constructor.
     *
     * @param ClientInterface $client
     * @param City            $city
     * @param UrlInterface    $url
     */
    public function __construct(ClientInterface $client, City $city, UrlInterface $url)
    {
        $this->client     = $client;
        $this->city       = $city;
        $this->url        = $url;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     *
     * @return OpenWeatherMap
     */
    public function setCount(int $count): OpenWeatherMap
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @return Data[]
     */
    public function getStack(): array
    {
        return $this->stack;
    }

    /**
     * @param Data[] $stack
     *
     * @return OpenWeatherMap
     */
    public function setStack(array $stack): OpenWeatherMap
    {
        $this->stack = $stack;
        return $this;
    }

    /**
     * fillData
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fillData()
    {
        $url = $this->url->getUrl();
        try {
            $response = $this->client->request('get', $url);
            $tmpArr = \json_decode($response->getBody(), true);
            if (isset($tmpArr['cnt']) && isset($tmpArr['list'])) {
                $this->count = $tmpArr['cnt'];
            } else {

            }
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}