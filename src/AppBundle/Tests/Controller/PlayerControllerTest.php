<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Tests\TestBaseWeb;

class PlayerControllerTest extends TestBaseWeb
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/player/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Player', $crawler->filter('#container h1')->text());
    }
}
