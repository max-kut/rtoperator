<?php

namespace Tests;

use Rtoperator\Client;

class FakeClient extends Client
{
    protected function getData(array $params): array
    {
        return json_decode(file_get_contents(__DIR__.'/fake_data/'.$params['entity'].'.json'), true);
    }
}