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
     * @ORM\OneToMany(targetEntity="Company", mappedBy="industry")
     */
    private $companies;
    
    /**
     * @ORM\OneToMany(targetEntity="Experience", mappedBy="industry")
     */
    private $experiences;
    
    
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
     * Constructor
     */
    public function __construct()
    {
        $this->jobs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->experiences = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Add companies
     *
     * @param \Objects\KarasBundle\Entity\Company $companies
     * @return Industry
     */
    public function addCompanie(\Objects\KarasBundle\Entity\Company $companies)
    {
        $this->companies[] = $companies;
    
        return $this;
    }

    /**
     * Remove companies
     *
     * @param \Objects\KarasBundle\Entity\Company $companies
     */
    public function removeCompanie(\Objects\KarasBundle\Entity\Company $companies)
    {
        $this->companies->removeElement($companies);
    }

    /**
     * Get companies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompanies()
    {
        return $this->companies;
    }
}