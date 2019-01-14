<?php

include 'vendor/autoload.php';

$url = new \OpenWeatherMapApi\Url();
$url->setAppId('2f7ede8126254176f0d7ead8d91a7bd6')
    ->setType(\OpenWeatherMapApi\Url::TYPE_WEATHER)
    ->setCity((new \OpenWeatherMapApi\City())->setQuery('Saint Petersburg, RU'));

$owm = new \OpenWeatherMapApi\OpenWeatherMap(new \GuzzleHttp\Client(), $url);

var_dump($owm->getStack());