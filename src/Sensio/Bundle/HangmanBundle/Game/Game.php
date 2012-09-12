<?php

namespace Sensio\Bundle\HangmanBundle\Game;

class Game 
{
    const MAX_ATTEMPTS = 11;

    private $word;

    private $attempts;

    private $triedLetters;

    private $foundLetters;

    public function __construct($word, $attempts = 0, array $triedLetters = array(), array $foundLetters = array())
    {
        $this->word = strtolower($word);
        $this->attempts = (int) $attempts;
        $this->triedLetters = $triedLetters;
        $this->foundLetters = $foundLetters;
    }

    public function getContext()
    {
        return array(
            'word'          => (string) $this->word,
            'attempts'      => $this->attempts,
            'found_letters' => $this->foundLetters,
            'tried_letters' => $this->triedLetters,
        );
    }

    public function getRemainingAttempts()
    {
        return static::MAX_ATTEMPTS - $this->attempts;
    }

    public function isLetterFound($letter)
    {
        return in_array(strtolower($letter), $this->foundLetters);
    }

    public function isHanged()
    {
        return static::MAX_ATTEMPTS === $this->attempts;
    }

    public function isOver()
    {
        return $this->isWon() || $this->isHanged();
    }

    public function isWon()
    {
        $diff = array_diff($this->getWordLetters(), $this->foundLetters);

        return 0 === count($diff);
    }

    public function getWord()
    {
        return $this->word;
    }

    public function getWordLetters()
    {
        return str_split($this->word);
    }

    public function getAttempts()
    {
        return $this->attempts;
    }

    public function getTriedLetters()
    {
        return $this->triedLetters;
    }

    public function getFoundLetters()
    {
        return $this->foundLetters;
    }

    public function reset()
    {
        $this->attempts = 0;
        $this->triedLetters = array();
        $this->foundLetters = array();
    }

    public function tryWord($word)
    {
        if ($word === $this->word) {
            $this->foundLetters = array_unique($this->getWordLetters());

            return true;
        }

        $this->attempts = self::MAX_ATTEMPTS;

        return false;
    }

    public function tryLetter($letter)
    {
        $letter = strtolower($letter);

        if (0 === preg_match('/^[a-z]$/', $letter)) {
            throw new \InvalidArgumentException(sprintf('The letter "%s" is not a valid ASCII character matching [a-z].', $letter));
        }

        if (in_array($letter, $this->triedLetters)) {
            $this->attempts++;

            return false;
        }

        if (false !== strpos($this->word, $letter)) {
            $this->foundLetters[] = $letter;
            $this->triedLetters[] = $letter;

            return true;
        }

        $this->triedLetters[] = $letter;
        $this->attempts++;

        return false;
    }
}