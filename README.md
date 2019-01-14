 # OpenWeatherMapApi

 Позволяет получать погоду с сайта openweathermap.org
 
 ####  Погода на день
 
 Погода на день (используя буквенный указатель города и страны)
 
  ```php
$url = new \OpenWeatherMapApi\Url();
$url = new \OpenWeatherMapApi\Url();
$url->setAppId('api_key')
    ->setType(\OpenWeatherMapApi\Url::TYPE_WEATHER)
    ->setCity((new \OpenWeatherMapApi\City())->setQuery('Saint Petersburg, RU'));

$owm = new \OpenWeatherMapApi\OpenWeatherMap(new \GuzzleHttp\Client(), $url);
var_dump($owm->getCount());
var_dump($owm->getStack());

``` 

  #### Погода на пять жней, 3-х часовой прогноз
  
  Погода на 5 дней (используя буквенный указатель города и страны)
  
  ```php
$url = new \OpenWeatherMapApi\Url();
$url->setAppId('api_key')
    ->setType(\OpenWeatherMapApi\Url::TYPE_FORECAST)
    ->setCity((new \OpenWeatherMapApi\City())->setQuery('Saint Petersburg, RU'));

$owm = new \OpenWeatherMapApi\OpenWeatherMap(new \GuzzleHttp\Client(), $url);

var_dump($owm->getCount());
var_dump($owm->getStack());
```
