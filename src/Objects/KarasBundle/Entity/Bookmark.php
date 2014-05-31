<?php

namespace Objects\KarasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bookmark
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Objects\KarasBundle\Entity\BookmarkRepository")
 */
class Bookmark
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="inquired", type="boolean")
     */
    private $inquired = False;

    
    /**
     * @ORM\ManyToOne(targetEntity="\Objects\UserBundle\Entity\User", inversedBy="bookmarks")
     */
    private $employer;
    
    /**
     * @ORM\ManyToOne(targetEntity="\Objects\UserBundle\Entity\User", inversedBy="bookmarkeds")
     */
    private $employee;

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
     * Set inquired
     *
     * @param boolean $inquired
     * @return Bookmark
     */
    public function setInquired($inquired)
    {
        $this->inquired = $inquired;
    
        return $this;
    }

    /**
     * Get inquired
     *
     * @return boolean 
     */
    public function getInquired()
    {
        return $this->inquired;
    }

    /**
     * Set employer
     *
     * @param \Objects\UserBundle\Entity\User $employer
     * @return Bookmark
     */
    public function setEmployer(\Objects\UserBundle\Entity\User $employer = null)
    {
        $this->employer = $employer;
    
        return $this;
    }

    /**
     * Get employer
     *
     * @return \Objects\UserBundle\Entity\User 
     */
    public function getEmployer()
    {
        return $this->employer;
    }

    /**
     * Set employee
     *
     * @param \Objects\UserBundle\Entity\User $employee
     * @return Bookmark
     */
    public function setEmployee(\Objects\UserBundle\Entity\User $employee = null)
    {
        $this->employee = $employee;
    
        return $this;
    }

    /**
     * Get employee
     *
     * @return \Objects\UserBundle\Entity\User 
     */
    public function getEmployee()
    {
        return $this->employee;
    }
}