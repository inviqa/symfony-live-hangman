<?php

namespace Sensio\Bundle\HangmanBundle\Game;

/**
 * This class is only used for functional testing purpose.
 *
 * It provides a collection of one single word to guess.
 */
class WordListMock extends WordList
{
    public function __construct()
    {
        parent::__construct();

        $this->addWord('php');
    }
}