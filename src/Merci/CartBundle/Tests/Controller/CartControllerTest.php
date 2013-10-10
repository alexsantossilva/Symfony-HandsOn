<?php

namespace Merci\CartBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CartControllerTest extends WebTestCase
{
    public function testIfCartUrlIsValid()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/cart/');

        $this->assertEquals(
            200,
            $client->getResponse()->getStatusCode()
        );
    }
}
