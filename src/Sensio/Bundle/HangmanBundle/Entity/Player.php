<?php

namespace Sensio\Bundle\HangmanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sensio\Bundle\HangmanBundle\Entity\Player
 *
 * @ORM\Table(name="sl_players")
 * @ORM\Entity(repositoryClass="Sensio\Bundle\HangmanBundle\Entity\PlayerRepository")
 */
class Player
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $username
     *
     * @ORM\Column(name="username", type="string", length=15, unique=true)
     *
     */
    private $username;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=60, unique=true)
     *
     */
    private $email;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=150)
     */
    private $password;

    /**
     * @var string $salt
     *
     * @ORM\Column(name="salt", type="string", length=40)
     */
    private $salt;

    /**
     * @var boolean $isActive
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var boolean $isAdmin
     *
     * @ORM\Column(name="is_admin", type="boolean")
     */
    private $isAdmin;

    /**
     * @var datetime $expiresAt
     *
     * @ORM\Column(name="expires_at", type="datetime", nullable=true)
     */
    private $expiresAt;

    private $rawPassword;

    /**
     * @ORM\OneToMany(targetEntity="GameData", mappedBy="player")
     *
     */
    private $games;

    public function __construct()
    {
        $this->games     = array();
        $this->isActive  = true;
        $this->isAdmin   = false;
        $this->expiresAt = new \DateTime('+30 days');
    }

    public function setRawPassword($password)
    {
        $this->rawPassword = $password;
    }

    public function getRawPassword()
    {
        return $this->rawPassword;
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
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set isAdmin
     *
     * @param boolean $isAdmin
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * Get isAdmin
     *
     * @return boolean 
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * Set expiresAt
     *
     * @param datetime $expiresAt
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;
    }

    /**
     * Get expiresAt
     *
     * @return datetime 
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }
}