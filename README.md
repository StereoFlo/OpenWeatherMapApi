 # OpenWeatherMapApi

 Позволяет получать погоду с сайта openweathermap.org
 
 ####  Погода на день
 
 Погода на день
 
  ```php
$city   = new City('Saint Petersburg, RU', 498817); // или буквенный указатель/или айди
$url    = new Url('appId', Url::TYPE_WEATHER, $city);
$client = new Client();
$owm    = new OpenWeatherMap($client, $url);

var_dump($owm->getCount());
var_dump($owm->getStack());

``` 

  #### Погода на пять дней, 3-х часовой прогноз
  
  Погода на 5 дней (используя буквенный указатель города и страны)
  
  ```php
$city   = new City('Saint Petersburg, RU', 498817); // или буквенный указатель/или айди
$url    = new Url('appId', Url::TYPE_FORECAST5, $city);
$client = new Client();
$owm    = new OpenWeatherMap($client, $url);

var_dump($owm->getCount());
var_dump($owm->getStack());
```

 #### Погода на 16 дней (только платные аккаунты)
 
  ```php
$city   = new City('Saint Petersburg, RU', 498817); // или буквенный указатель/или айди
$url    = new Url('appId', Url::TYPE_FORECAST16, $city);
$client = new Client();
$owm    = new OpenWeatherMap($client, $url);

var_dump($owm->getCount());
var_dump($owm->getStack());
```