<?php

namespace Sensio\Bundle\HangmanBundle\Loader;

abstract class FileLoader implements LoaderInterface
{
    protected $words;
    protected $file;

    public function __construct($file)
    {
        if (!file_exists($file) || !is_readable($file)) {
            throw new \InvalidArgumentException(sprintf('File "%s" does not exist or is not readable.', $file));
        }

        $this->file = $file;
    }

    public function getWords()
    {
        return $this->words;
    }
}