<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TrainerControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/trainer/vasya');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Vasya', $crawler->filter('#container h1')->text());
    }
}
