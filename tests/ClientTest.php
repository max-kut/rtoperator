<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Rtoperator\Data\All;
use Rtoperator\Data\CategoryCollection;
use Rtoperator\Data\CategoryMapCollection;
use Rtoperator\Data\CountryCollection;
use Rtoperator\Data\DatesCollection;
use Rtoperator\Data\DiscountCollection;
use Rtoperator\Data\PriceCollection;
use Rtoperator\Data\ServicesCollection;
use Rtoperator\Data\TourCollection;

class ClientTest extends TestCase
{
    private $httpClient;

    public function setUp(): void
    {
        $this->httpClient = new FakeClient();
    }

    /**
     * @param $entity
     * @dataProvider entityProviderParams
     * @return mixed
     * @throws \ReflectionException
     */
    public function testGetParams($entity)
    {
        $res = PHPUnitUtil::callMethod($this->httpClient, 'getParams', [$entity]);
        $this->assertStringContainsString('json', $res['data_type']);
        $this->assertStringContainsString($entity, $res['entity']);

        return $res;
    }

    public function testGetAll()
    {
        $res = $this->httpClient->getAll();
        $this->assertTrue($res instanceof All);
    }

    public function testGetTours()
    {
        $res = $this->httpClient->getTours();
        $this->assertTrue($res instanceof TourCollection);
    }

    public function testGetTourDates()
    {
        $res = $this->httpClient->getTourDates(95);
        $this->assertTrue($res instanceof DatesCollection);
    }

    public function testGetTourImages()
    {
        $res = $this->httpClient->getTourImages(95);
        $this->assertTrue(is_array($res));
    }

    public function testGetTourServices()
    {
        $res = $this->httpClient->getTourServices(95);
        $this->assertTrue($res instanceof ServicesCollection);
    }

    public function testGetServiceDiscounts()
    {
        $res = $this->httpClient->getServiceDiscounts(235);
        $this->assertTrue($res instanceof DiscountCollection);
    }

    public function testGetTourPrice()
    {
        $res = $this->httpClient->getTourPrice(95);
        $this->assertTrue($res instanceof PriceCollection);
    }

    public function testGetCountries()
    {
        $res = $this->httpClient->getCountries();
        $this->assertTrue($res instanceof CountryCollection);
    }

    public function testGetDiscounts()
    {
        $res = $this->httpClient->getDiscounts();
        $this->assertTrue($res instanceof DiscountCollection);
    }

    public function testGetCategoryMap()
    {
        $res = $this->httpClient->getCategoryMap();
        $this->assertTrue($res instanceof CategoryMapCollection);
    }

    public function testGetCategories()
    {
        $res = $this->httpClient->getCategories();
        $this->assertTrue($res instanceof CategoryCollection);
    }

    public function entityProviderParams()
    {
        return [
            ['all'],
            ['tour'],
            ['tourDate'],
            ['tourImage'],
            ['tourService'],
            ['tourDiscount'],
            ['tourCity'],
            ['discount'],
            ['price'],
            ['categoryMap'],
            ['category'],
            ['country'],
        ];
    }
}