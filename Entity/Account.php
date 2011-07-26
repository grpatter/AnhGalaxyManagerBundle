<?php
/**
 * Represents a user that participates in one or more managed Galaxies.
 *
 * Copyright (c) 2011 Eric Barr <eb@anhstudios.com>
 */

namespace Anh\GalaxyManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="account")
 */
class Account extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\generatedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     *  @ORM\OneToMany(targetEntity="AccountSession", mappedBy="account")
     *
     */
    protected $sessions;
     
    public function __construct()
    {
        $this->sessions = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add sessions
     *
     * @param Anh\GalaxyManagerBundle\Entity\AccountSession $sessions
     */
    public function addSessions(\Anh\GalaxyManagerBundle\Entity\AccountSession $sessions)
    {
        $this->sessions[] = $sessions;
    }

    /**
     * Get sessions
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSessions()
    {
        return $this->sessions;
    }
}