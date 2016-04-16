<?php

namespace ContactboxBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AddressControllerTest extends WebTestCase
{
    public function testAddaddress()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addAddress');
    }

    public function testCreateaddress()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/createAddress');
    }

    public function testDeleteaddress()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteAddress');
    }

}
