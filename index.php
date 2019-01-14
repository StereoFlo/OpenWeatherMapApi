<?php

include 'vendor/autoload.php';

$city = new \OpenWeatherMapApi\City();
$city->setQuery('Saint Petersburg, RU');
$url = new \OpenWeatherMapApi\Url();
$url->setAppId('')
    ->setType(\OpenWeatherMapApi\Url::TYPE_FORECAST)
    ->setCity($city);

$owm = new \OpenWeatherMapApi\OpenWeatherMap(new \GuzzleHttp\Client(), $city, $url);

var_dump($owm->fillData());