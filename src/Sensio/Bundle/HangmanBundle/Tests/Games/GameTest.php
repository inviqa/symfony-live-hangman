<?php

namespace Sensio\Bundle\HangmanBundle\Tests\Game;

use Sensio\Bundle\HangmanBundle\Game\Game;

class GameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideWords
     */
    public function testTryCorrectWord($word)
    {
        $game = new Game($word);
        $this->assertTrue($game->tryWord($word));
        $this->assertTrue($game->isWon());
        $this->assertTrue($game->isOver());
        $this->assertFalse($game->isHanged());
    }

    public function testTryWrongWord()
    {
        $game = new Game('php');
        $this->assertFalse($game->tryWord('foo'));
        $this->assertFalse($game->isWon());
        $this->assertTrue($game->isHanged());
        $this->assertTrue($game->isOver());
        $this->assertEquals(0, $game->getRemainingAttempts());
    }

    public function testTryCorrectLetter()
    {
        $game = new Game('php');
        $this->assertTrue($game->tryLetter('P'));
        $this->assertTrue($game->isLetterFound('P'));
        $this->assertContains('p', $game->getFoundLetters());
        $this->assertContains('p', $game->getTriedLetters());
        $this->assertEquals(0, $game->getAttempts());
    }

    public function  testTryWrongLetter()
    {
        $game = new Game('php');
        $this->assertFalse($game->tryLetter('X'));
        $this->assertFalse($game->isLetterFound('X'));
        $this->assertNotContains('x', $game->getFoundLetters());
        $this->assertContains('x', $game->getTriedLetters());
        $this->assertEquals(1, $game->getAttempts());
    }

    public function testTryNumber()
    {
        $this->setExpectedException('InvalidArgumentException');

        $game = new Game('php');
        $game->tryLetter(10);
    }

    public function testTryLetterTwice()
    {
        $game = new Game('php');
        $this->assertTrue($game->tryLetter('P'));
        $this->assertFalse($game->tryLetter('P'));
    }

    public function provideWords()
    {
        return array(
            array('php'),
            array('java'),
            array('aircraft'),
            array('software'),
        );
    }

}
