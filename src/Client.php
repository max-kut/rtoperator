<?php

namespace Rtoperator;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\RequestInterface;
use Rtoperator\Data\All;
use Rtoperator\Data\CategoryCollection;
use Rtoperator\Data\CategoryMapCollection;
use Rtoperator\Data\CountryCollection;
use Rtoperator\Data\DatesCollection;
use Rtoperator\Data\DiscountCollection;
use Rtoperator\Data\PriceCollection;
use Rtoperator\Data\ServicesCollection;
use Rtoperator\Data\TourCollection;

/**
 * Class Client
 *
 * @package Rtoperator
 * @see https://www.rtoperator.ru/export.html
 */
class Client
{
    const VERSION = 1.0;

    const BASE_URl = 'https://www.rtoperator.ru';

    const E_ALL = 'all';
    const E_TOURS = 'tour';
    const E_TOUR_DATES = 'tourDate';
    const E_TOUR_IMAGES = 'tourImage';
    const E_TOUR_SERVICES = 'tourService';
    const E_TOUR_DISCOUNTS = 'tourDiscount';
    const E_TOUR_CITY = 'tourCity';
    const E_TOUR_PRICE = 'price';
    const E_DISCOUNTS = 'discount';
    const E_CATEGORY_MAP = 'categoryMap';
    const E_CATEGORIES = 'category';
    const E_COUNTRIES = 'country';

    /**
     * @var \GuzzleHttp\Client
     */
    private $httpClient;

    public function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri'              => self::BASE_URl,
            RequestOptions::TIMEOUT => 30,
            RequestOptions::VERIFY  => false,
            RequestOptions::HEADERS => [
                'User-Agent' => 'rtoperator.ru client v.' . self::VERSION . ' (https://github.com/max-kut/rtoperator)'
            ],
            RequestOptions::COOKIES => false,
        ]);
    }

    /**
     * @return \Rtoperator\Data\All
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAll(): All
    {
        return All::make($this->getData($this->getParams(static::E_ALL)));
    }

    /**
     * @return \Rtoperator\Data\TourCollection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTours(): TourCollection
    {
        return TourCollection::make($this->getData($this->getParams(static::E_TOURS)));
    }

    /**
     * @param int $tourId
     * @return \Rtoperator\Data\DatesCollection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTourDates(int $tourId): DatesCollection
    {
        $params = array_merge($this->getParams(static::E_TOUR_DATES), ['tour_id' => $tourId]);

        return DatesCollection::make($this->getData($params));
    }

    /**
     * @param int $tourId
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTourImages(int $tourId): array
    {
        return $this->getData(array_merge($this->getParams(static::E_TOUR_IMAGES), ['tour_id' => $tourId]));
    }

    /**
     * @param int $tourId
     * @return \Rtoperator\Data\ServicesCollection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTourServices(int $tourId): ServicesCollection
    {
        $params = array_merge($this->getParams(static::E_TOUR_SERVICES), ['tour_id' => $tourId]);

        return ServicesCollection::make($this->getData($params));
    }

    /**
     * @param int $serviceId
     * @return \Rtoperator\Data\DiscountCollection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getServiceDiscounts(int $serviceId): DiscountCollection
    {
        $params = array_merge($this->getParams(static::E_TOUR_DISCOUNTS), ['service_id' => $serviceId]);

        return DiscountCollection::make($this->getData($params));
    }

    /**
     * @param int $tourId
     * @return \Rtoperator\Data\PriceCollection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTourPrice(int $tourId): PriceCollection
    {
        $params = array_merge($this->getParams(static::E_TOUR_PRICE), ['tour_id' => $tourId]);

        return PriceCollection::make($this->getData($params));
    }

    /**
     * @return \Rtoperator\Data\CountryCollection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCountries(): CountryCollection
    {
        return CountryCollection::make($this->getData($this->getParams(static::E_COUNTRIES)));
    }

    /**
     * @return \Rtoperator\Data\DiscountCollection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDiscounts(): DiscountCollection
    {
        return DiscountCollection::make($this->getData($this->getParams(static::E_DISCOUNTS)));
    }

    /**
     * @return \Rtoperator\Data\CategoryMapCollection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCategoryMap(): CategoryMapCollection
    {
        return CategoryMapCollection::make($this->getData($this->getParams(static::E_CATEGORY_MAP)));
    }

    /**
     * @return \Rtoperator\Data\CategoryCollection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCategories(): CategoryCollection
    {
        return CategoryCollection::make($this->getData($this->getParams(static::E_CATEGORIES)));
    }

    /**
     * @param string $entity
     * @return array
     */
    private function getParams(string $entity): array
    {
        return [
            'data_type' => 'json',
            'entity'    => $entity
        ];
    }

    /**
     * @param array $params
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function getData(array $params): array
    {
        return json_decode(
            $this->httpClient->send($this->getRequest($params))->getBody()->getContents(),
            true
        );
    }

    private function getRequest(array $params): RequestInterface
    {
        return new Request('GET', '/export.html?' . http_build_query($params));
    }
}
