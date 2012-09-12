<?php

namespace Sensio\Bundle\HangmanBundle\Game;

use Symfony\Component\HttpFoundation\Session\Session;

class GameContext
{
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function reset()
    {
        $this->session->set('hangman', array());
    }

    public function newGame($word)
    {
        return new Game($word);
    }

    public function loadGame()
    {
        $data = $this->session->get('hangman');

        if (!count($data)) {
            return false;
        }

        return new Game($data['word'], $data['attempts'], $data['tried_letters'], $data['found_letters']);
    }

    public function save(Game $game)
    {
        $this->session->set('hangman', $game->getContext());
    }
}