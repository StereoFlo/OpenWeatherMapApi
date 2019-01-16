<?php

use GuzzleHttp\Client;
use OpenWeatherMapApi\City;
use OpenWeatherMapApi\OpenWeatherMap;
use OpenWeatherMapApi\Url;

include 'vendor/autoload.php';

$city   = new City('Saint Petersburg, RU', 498817);
$url    = new Url('appId', Url::TYPE_FORECAST5, $city);
$client = new Client();
$owm    = new OpenWeatherMap($client, $url);

var_dump($owm->getStack());