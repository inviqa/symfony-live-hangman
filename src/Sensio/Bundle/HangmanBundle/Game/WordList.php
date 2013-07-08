<?php

namespace Sensio\Bundle\HangmanBundle\Game;

use Sensio\Bundle\HangmanBundle\Loader\LoaderInterface;
use Sensio\Bundle\HangmanBundle\Loader\TextFileLoader;
use Sensio\Bundle\HangmanBundle\Loader\XmlFileLoader;

class WordList
{
    private $words;

    private $dictionaries;

    public function __construct(array $dictionaries)
    {
        $this->words = array();
        $this->dictionaries = $dictionaries;
    }

    public function loadDictionaries()
    {
        foreach ($this->dictionaries as $dictionary) {
            $this->loadDictionary($dictionary);
        }
    }

    private function loadDictionary($path)
    {
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        switch (strtolower($extension)) {
            case 'xml':
                $this->load(new XmlFileLoader($path));
                break;
            case 'txt';
                $this->load(new TextFileLoader($path));
                break;
            default:
                throw new \RuntimeException(sprintf('There is no loader able to load a %s dictionary.', strtoupper($extension)));
        }
    }

    public function getRandomWord($length)
    {
        if (!isset($this->words[$length])) {
            throw new \InvalidArgumentException(sprintf('There is no word of length %u.', $length));
        }

        $key = array_rand($this->words[$length]);

        return $this->words[$length][$key];
    }

    public function addWord($word)
    {
        $length = strlen($word);

        if (!isset($this->words[$length])) {
            $this->words[$length] = array();
        }

        if (!in_array($word, $this->words[$length])) {
            $this->words[$length][] = $word;
        }
    }

    public function load(LoaderInterface $loader)
    {
        $loader->load();

        foreach ($loader->getWords() as $word) {
            $this->addWord($word);
        }
    }
}