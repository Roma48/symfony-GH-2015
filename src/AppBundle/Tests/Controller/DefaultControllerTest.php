<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CommandControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/command/dynamo');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Command', $crawler->filter('#welcome h1')->text());
    }
}
