<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Tests\TestBaseWeb;

class TrainerControllerTest extends TestBaseWeb
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/trainer/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Trainer', $crawler->filter('#container h1')->text());
    }
}
