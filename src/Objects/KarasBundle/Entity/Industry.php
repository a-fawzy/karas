<?php

namespace Objects\KarasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Industry
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Objects\KarasBundle\Entity\IndustryRepository")
 */
class Industry
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="Job", mappedBy="industry")
     */
    private $jobs;

    /**
     * @ORM\OneToMany(targetEntity="Experience", mappedBy="industry")
     */
    private $experiences;
    
    /**
     * @ORM\OneToMany(targetEntity="\Objects\UserBundle\Entity\User", mappedBy="industry")
     */
    private $users;
    
    
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
     * Set title
     *
     * @param string $title
     * @return Industry
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    public function __toString() {
        return (string) $this->title;
    }

    
    /**
     * Add jobs
     *
     * @param \Objects\KarasBundle\Entity\Job $jobs
     * @return Industry
     */
    public function addJob(\Objects\KarasBundle\Entity\Job $jobs)
    {
        $this->jobs[] = $jobs;
    
        return $this;
    }

    /**
     * Remove jobs
     *
     * @param \Objects\KarasBundle\Entity\Job $jobs
     */
    public function removeJob(\Objects\KarasBundle\Entity\Job $jobs)
    {
        $this->jobs->removeElement($jobs);
    }

    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJobs()
    {
        return $this->jobs;
    }
    
    
    /**
     * Add experiences
     *
     * @param \Objects\KarasBundle\Entity\Experience $experiences
     * @return Industry
     */
    public function addExperience(\Objects\KarasBundle\Entity\Experience $experiences)
    {
        $this->experiences[] = $experiences;
    
        return $this;
    }

    /**
     * Remove experiences
     *
     * @param \Objects\KarasBundle\Entity\Experience $experiences
     */
    public function removeExperience(\Objects\KarasBundle\Entity\Experience $experiences)
    {
        $this->experiences->removeElement($experiences);
    }

    /**
     * Get experiences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExperiences()
    {
        return $this->experiences;
    }

    /**
     * Add users
     *
     * @param \Objects\UserBundle\Entity\User $users
     * @return Industry
     */
    public function addUser(\Objects\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Objects\UserBundle\Entity\User $users
     */
    public function removeUser(\Objects\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jobs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->experiences = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
}