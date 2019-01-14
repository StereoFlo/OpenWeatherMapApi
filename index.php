<?php

include 'vendor/autoload.php';

$url = new \OpenWeatherMapApi\Url();
$url->setAppId('å')
    ->setType(\OpenWeatherMapApi\Url::TYPE_FORECAST)
    ->setCity((new \OpenWeatherMapApi\City())->setQuery('Saint Petersburg, RU'));

$owm = new \OpenWeatherMapApi\OpenWeatherMap(new \GuzzleHttp\Client(), $url);

var_dump($owm->getStack());