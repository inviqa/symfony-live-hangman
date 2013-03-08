<?php

namespace Sensio\Bundle\HangmanBundle\Tests\Game;

use Sensio\Bundle\HangmanBundle\Game\GameContext;

class GameContextTest extends \PHPUnit_Framework_TestCase
{
    public function testLoadTheGame()
    {
        $data = array(
            'word' => 'php',
            'attempts' => 1,
            'tried_letters' => array('P', 'X'),
            'found_letters' => array('P'),
        );

        $session = $this
            ->getMockBuilder('Symfony\Component\HttpFoundation\Session\Session')
            ->setMethods(array('get'))
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $session
            ->expects($this->once())
            ->method('get')
            ->with($this->equalTo('hangman'))
            ->will($this->returnValue($data))
        ;

        $context = new GameContext($session);

        $this->assertInstanceOf(
            'Sensio\Bundle\HangmanBundle\Game\Game',
            $context->loadGame()
        );
    }

    public function testCantLoadTheGame()
    {
        $session = $this
            ->getMockBuilder('Symfony\Component\HttpFoundation\Session\Session')
            ->setMethods(array('get'))
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $session
            ->expects($this->once())
            ->method('get')
            ->with($this->equalTo('hangman'))
            ->will($this->returnValue(null))
        ;

        $context = new GameContext($session);

        $this->assertFalse(
            $context->loadGame()
        );
    }

    public function testSaveTheGame()
    {
        $data = array(
            'word' => 'php',
            'attempts' => 1,
            'tried_letters' => array('P', 'X'),
            'found_letters' => array('P'),
        );

        $session = $this
            ->getMockBuilder('Symfony\Component\HttpFoundation\Session\Session')
            ->setMethods(array('set'))
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $session
            ->expects($this->once())
            ->method('set')
            ->with($this->equalTo('hangman'), $this->equalTo($data))
        ;

        $game = $this
            ->getMockBuilder('Sensio\Bundle\HangmanBundle\Game\Game')
            ->setMethods(array('getContext'))
            ->setConstructorArgs(array_values($data))
            ->getMock()
        ;

        $game
            ->expects($this->once())
            ->method('getContext')
            ->will($this->returnValue($data))
        ;

        $context = new GameContext($session);

        $this->assertNull(
            $context->save($game)
        );
    }
}
