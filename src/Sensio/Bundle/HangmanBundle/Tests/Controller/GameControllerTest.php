<?php

namespace Sensio\Bundle\HangmanBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GameControllerTest extends WebTestCase
{
    private $client;

    // Write your functional test scenario here...

    protected function setUp()
    {
        parent::setUp();

        $this->client = static::createClient();
        $this->client->followRedirects(true);
    }

    public function testTryWord()
    {
        $crawler = $this->client->request('GET', '/game/');
        $form = $crawler->selectButton('Let me guess...')->form();
        $crawler = $this->client->submit($form, array('word' => 'php'));

        $this->assertEquals(
            'Congratulations!',
            $crawler->filter('#content > h2:first-child')->text()
        );
    }

    protected function tearDown()
    {
        $this->client = null;

        parent::tearDown();
    }
}
