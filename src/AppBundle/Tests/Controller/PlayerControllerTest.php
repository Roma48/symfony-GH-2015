<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PlayerControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/player/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Alex', $crawler->filter('#container h1')->text());
    }
}
