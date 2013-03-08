<?php

namespace Sensio\Bundle\HangmanBundle\Tests\Game;

use Sensio\Bundle\HangmanBundle\Game\Game;

class GameTest extends \PHPUnit_Framework_TestCase
{
    public function testTryCorrectWord()
    {
        $game = new Game('php');
        $this->assertTrue($game->tryWord('php'));
    }
}
