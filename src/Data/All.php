<?php

namespace Rtoperator\Data;

class All
{
    /** @var \Rtoperator\Data\TourCollection $tours */
    public $tours;
    /** @var \Rtoperator\Data\CountryCollection $countries */
    public $countries;
    /** @var \Rtoperator\Data\CategoryCollection $categories */
    public $categories;
    /** @var \Rtoperator\Data\CategoryMapCollection $categoryMap */
    public $categoryMap;
    
    /**
     * AllData constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->tours = TourCollection::make($data['tour']);
        $this->categories = CategoryCollection::make($data['category']);
        $this->categoryMap = CategoryMapCollection::make($data['categoryMap']);
        $this->countries = CountryCollection::make($data['country']);
    }
    
    /**
     * @param array $data
     * @return static
     */
    public static function make(array $data)
    {
        return new static($data);
    }
}
