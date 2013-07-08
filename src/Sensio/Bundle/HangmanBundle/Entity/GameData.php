<?php

namespace Sensio\Bundle\HangmanBundle\Entity;

use Sensio\Bundle\HangmanBundle\Game\Game;
use Doctrine\ORM\Mapping as ORM;

/**
 * Sensio\Bundle\HangmanBundle\Entity\GameData
 *
 * @ORM\Table(name="sl_games")
 * @ORM\Entity(repositoryClass="Sensio\Bundle\HangmanBundle\Entity\GameDataRepository")
 */
class GameData
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $token
     *
     * @ORM\Column(name="token", type="string", length=10, unique=true)
     */
    private $token;

    /**
     * @var string $word
     *
     * @ORM\Column(name="word", type="string", length=20)
     */
    private $word;

    /**
     * @var smallint $attempts
     *
     * @ORM\Column(name="attempts", type="smallint")
     */
    private $attempts;

    /**
     * @var string $triedLetters
     *
     * @ORM\Column(name="tried_letters", type="string", length=30, nullable=true)
     */
    private $triedLetters;

    /**
     * @var string $foundLetters
     *
     * @ORM\Column(name="found_letters", type="string", length=30, nullable=true)
     */
    private $foundLetters;

    /**
     * @var smallint $score
     *
     * @ORM\Column(name="score", type="smallint")
     */
    private $score;

    /**
     * @var string $status
     *
     * @ORM\Column(name="status", type="string", length=15)
     */
    private $status;

    /**
     * @var datetime $startAt
     *
     * @ORM\Column(name="start_at", type="datetime")
     */
    private $startAt;

    /**
     * @var datetime $endAt
     *
     * @ORM\Column(name="end_at", type="datetime", nullable=true)
     */
    private $endAt;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="games")
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $player;

    public function __construct()
    {
        $this->score = 0;
        $this->attempts = 0;
        $this->status = 'started';
        $this->startAt = new \DateTime();
        $this->token = substr(sha1(uniqid().rand(0, 999999)), 0, 10);
    }

    public function setPlayer(Player $player)
    {
        $this->player = $player;
    }

    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set token
     *
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set word
     *
     * @param string $word
     */
    public function setWord($word)
    {
        $this->word = $word;
    }

    /**
     * Get word
     *
     * @return string 
     */
    public function getWord()
    {
        return $this->word;
    }

    /**
     * Set attempts
     *
     * @param smallint $attempts
     */
    public function setAttempts($attempts)
    {
        $this->attempts = $attempts;
    }

    /**
     * Get attempts
     *
     * @return smallint 
     */
    public function getAttempts()
    {
        return $this->attempts;
    }

    /**
     * Set triedLetters
     *
     * @param array $triedLetters
     */
    public function setTriedLetters(array $triedLetters)
    {
        if (count($triedLetters)) {
            $this->triedLetters = implode(',', $triedLetters);
        }
    }

    /**
     * Get triedLetters
     *
     * @return array 
     */
    public function getTriedLetters()
    {
        if ($this->triedLetters) {
            return explode(',', $this->triedLetters);
        }

        return array();
    }

    /**
     * Set foundLetters
     *
     * @param array $foundLetters
     */
    public function setFoundLetters(array $foundLetters)
    {
        if (count($foundLetters)) {
            $this->foundLetters = implode(',', $foundLetters);
        }
    }

    /**
     * Get foundLetters
     *
     * @return array 
     */
    public function getFoundLetters()
    {
        if ($this->foundLetters) {
            return explode(',', $this->foundLetters);
        }

        return array();
    }

    /**
     * Set score
     *
     * @param smallint $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * Get score
     *
     * @return smallint 
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set startAt
     *
     * @param datetime $startAt
     */
    public function setStartAt($startAt)
    {
        $this->startAt = $startAt;
    }

    /**
     * Get startAt
     *
     * @return datetime 
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * Set endAt
     *
     * @param datetime $endAt
     */
    public function setEndAt($endAt)
    {
        $this->endAt = $endAt;
    }

    /**
     * Get endAt
     *
     * @return datetime 
     */
    public function getEndAt()
    {
        return $this->endAt;
    }
}