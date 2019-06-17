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
        $this->count = 1;
        $this->stack[] = Data::create($data);
        return $this;
    }
}
