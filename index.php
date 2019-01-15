<?php

include 'vendor/autoload.php';

$url = new \OpenWeatherMapApi\Url();
$url->setAppId('')
    ->setType(\OpenWeatherMapApi\Url::TYPE_FORECAST5)
    ->setCity((new \OpenWeatherMapApi\City())
    ->setId(498817)
    ->setQuery('Saint Petersburg, RU'));
$client = new \GuzzleHttp\Client();

$owm = new \OpenWeatherMapApi\OpenWeatherMap($client, $url);

var_dump($owm->getStack());