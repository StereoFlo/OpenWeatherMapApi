<?php

include 'vendor/autoload.php';

$url = new \OpenWeatherMapApi\Url();
$url->setAppId('')
    ->setType(\OpenWeatherMapApi\Url::TYPE_FORECAST)
    ->setCity((new \OpenWeatherMapApi\City())->setQuery('Saint Petersburg, RU'));

$owm = new \OpenWeatherMapApi\OpenWeatherMap(new \GuzzleHttp\Client(), $city, $url);

var_dump($owm->fillData());