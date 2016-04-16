<?php

namespace ContactboxBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PhoneNumberControllerTest extends WebTestCase
{
    public function testAddphonenumber()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addPhonenumber');
    }

    public function testCreatephonenumber()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/createPhonenumber');
    }

    public function testDeletephonenumber()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deletePhonenumber');
    }

}
