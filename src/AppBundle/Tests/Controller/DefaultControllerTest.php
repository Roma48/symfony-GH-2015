<?php

namespace AppBundle\Tests\Controller;


use AppBundle\Tests\TestBaseWeb;

class CommandControllerTest extends TestBaseWeb
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/team/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Team', $crawler->filter('#welcome h1')->text());
    }
}
