<?php

namespace OpenWeatherMapApi;

use GuzzleHttp\ClientInterface;
use OpenWeatherMapApi\Data\Data;
use OpenWeatherMapApi\Data\DataItem\Clouds;

/**
 * Class OpenWeatherMap
 * @package OpenWeatherMapApi
 */
class OpenWeatherMap
{
    /**
     * @var Credential
     */
    private $credential;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var City
     */
    private $city;

    /**
     * @var string
     */
    private $type = '';

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
     * @param Credential      $credential
     * @param ClientInterface $client
     * @param City            $city
     * @param UrlInterface    $url
     */
    public function __construct(Credential $credential, ClientInterface $client, City $city, UrlInterface $url, string $type)
    {
        $this->credential = $credential;
        $this->client     = $client;
        $this->city       = $city;
        $this->url        = $url;
        $this->type       = $type;
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

    public function fillData()
    {
        $url = $this->url->setAppId($this->credential->getAppId())->setType($this->type)->getUrl($this->city);
        try {
            $response = $this->client->request('get', $url);
            $tmpArr = \json_decode($response->getBody());
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}