<?php

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BaseWebTestCase extends WebTestCase
{
    /**
     * Create an API client.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Client
     */
    protected function creatApiClient()
    {
        $client = static::createClient();

        $client->setServerParameter('HTTP_ACCEPT', 'application/vnd.api+json');

        return $client;
    }
}
