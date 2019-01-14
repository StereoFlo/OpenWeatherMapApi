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
     * @param UrlInterface    $url
     */
    public function __construct(ClientInterface $client, UrlInterface $url)
    {
        $this->client     = $client;
        $this->url        = $url;
        $this->fillData();
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
        try {
            $url = $this->url->getUrl();
            $response = $this->client->request('get', $url);
            $tmpArr = \json_decode($response->getBody(), true);
            if (isset($tmpArr['cnt']) && isset($tmpArr['list'])) {
                $this->count = $tmpArr['cnt'];
                foreach ($tmpArr['list'] as $item) {
                    $this->stack[] = Data::create($item);
                }
            } else {
                $this->count = 1;
                $this->stack[] = Data::create($tmpArr);
            }
            return $this;
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}