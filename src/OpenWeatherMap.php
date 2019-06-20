<?php

namespace OpenWeatherMapApi;

use Exception;
use GuzzleHttp\Psr7\Request;
use function json_decode;
use OpenWeatherMapApi\Data\Data;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;

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
     * @var int|null
     */
    private $cityId;

    /**
     * @var string|null
     */
    private $cityName;

    /**
     * @var int timestamp
     */
    private $timezone;

    /**
     * OpenWeatherMap constructor.
     *
     * @param ClientInterface $client
     * @param UrlInterface    $url
     *
     * @throws ClientExceptionInterface
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
     * @return Data[]
     */
    public function getStack(): array
    {
        return $this->stack;
    }

    /**
     * @return int|null
     */
    public function getCityId(): ?int
    {
        return $this->cityId;
    }

    /**
     * @return string|null
     */
    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    /**
     * @return int
     */
    public function getTimezone(): int
    {
        return $this->timezone;
    }

    /**
     * fillData
     * @return self
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function fillData(): self
    {
        try {
            $url = $this->url->getUrl();
            $response = $this->client->sendRequest(new Request('get', $url));
            $tmpArr = json_decode($response->getBody(), true);
            $this->fillStack($tmpArr);
            return $this;
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * @param array $data
     *
     * @return OpenWeatherMap
     */
    private function fillStack(array $data): self
    {
        if (isset($data['cnt']) && isset($data['list'])) {
            $this->count = $data['cnt'];
            foreach ($data['list'] as $item) {
                $this->stack[] = Data::create($item);
            }
            return $this;
        }

        if (isset($data['id'])) {
            $this->cityId = $data['id'];
        }

        if (isset($data['name'])) {
            $this->cityName = $data['name'];
        }

        if (isset($data['timezone'])) {
            $this->timezone = $data['timezone'];
        }

        $this->count = 1;
        $this->stack[] = Data::create($data);
        return $this;
    }
}
