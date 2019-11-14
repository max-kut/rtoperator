# www.rtoperator.ru API library

PHP обертка для работы с API [www.rtoperator.ru](https://www.rtoperator.ru "www.rtoperator.ru")

[Документация по API](https://www.rtoperator.ru/export.html). 

Библиотека еще в разработке. Не стесняйтесь создавать issue

## Установка
Установка в проект осуществляется при помощи **composer**: 

`$ composer require maxkut/rtoperator`

Минимальные системные требования:
`php: ^7.2`

## Использование

Тут все просто. 
```php
// make client
$client = new Rtoperator\Client();
// execute methods
$client->getAll(); // Rtoperator\Data\All
$client->getTours(); // Rtoperator\Data\TourCollection
$client->getTourDates($tourId); // Rtoperator\Data\DatesCollection
$client->getTourImages($tourId); // array|string[]
$client->getTourServices($tourId); // Rtoperator\Data\ServicesCollection
$client->getServiceDiscounts($serviceId); // Rtoperator\Data\DiscountCollection
$client->getTourPrice($tourId); // Rtoperator\Data\PriceCollection
$client->getCountries(); // Rtoperator\Data\CountryCollection
$client->getDiscounts(); // Rtoperator\Data\DiscountCollection
$client->getCategoryMap(); // Rtoperator\Data\CategoryMapCollection
$client->getCategories(); // Rtoperator\Data\CategoryCollection
```

### Помощь в разработке
создавайте PR