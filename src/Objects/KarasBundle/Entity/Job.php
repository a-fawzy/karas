<?php

namespace Objects\KarasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Job
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Objects\KarasBundle\Entity\JobRepository")
 */
class Job
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
     * @ORM\Column(name="title", type="string", length=50)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="experience", type="text")
     */
    private $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=6)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="skills", type="text")
     */
    private $skills;

    /**
     * @var string
     *
     * @ORM\Column(name="languages", type="string", length=100)
     */
    private $languages;

    /**
     * @var integer
     *
     * @ORM\Column(name="salary", type="integer")
     */
    private $salary;

    /**
     * @var string
     *
     * @ORM\Column(name="allowances", type="text")
     */
    private $allowances;

    /**
     * @var boolean
     *
     * @ORM\Column(name="approved", type="boolean")
     */
    private $approved = FALSE ;

    
    
    /**
     * @ORM\ManyToOne(targetEntity="\Objects\UserBundle\Entity\User", inversedBy="jobs")
     */
    private $owner;

    /**
     * @ORM\OneToMany(targetEntity="Candidate", mappedBy="job")
     */
    private $candidates;
    


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
     * @return Job
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

    /**
     * Set experience
     *
     * @param string $experience
     * @return Job
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    
        return $this;
    }

    /**
     * Get experience
     *
     * @return string 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Job
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Job
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set skills
     *
     * @param string $skills
     * @return Job
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    
        return $this;
    }

    /**
     * Get skills
     *
     * @return string 
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set languages
     *
     * @param string $languages
     * @return Job
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    
        return $this;
    }

    /**
     * Get languages
     *
     * @return string 
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Set salary
     *
     * @param integer $salary
     * @return Job
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    
        return $this;
    }

    /**
     * Get salary
     *
     * @return integer 
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set allowances
     *
     * @param string $allowances
     * @return Job
     */
    public function setAllowances($allowances)
    {
        $this->allowances = $allowances;
    
        return $this;
    }

    /**
     * Get allowances
     *
     * @return string 
     */
    public function getAllowances()
    {
        return $this->allowances;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->candidates = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set approved
     *
     * @param boolean $approved
     * @return Job
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;
    
        return $this;
    }

    /**
     * Get approved
     *
     * @return boolean 
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set owner
     *
     * @param \Objects\UserBundle\Entity\User $owner
     * @return Job
     */
    public function setOwner(\Objects\UserBundle\Entity\User $owner = null)
    {
        $this->owner = $owner;
    
        return $this;
    }

    /**
     * Get owner
     *
     * @return \Objects\UserBundle\Entity\User 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add candidates
     *
     * @param \Objects\UserBundle\Entity\User $candidates
     * @return Job
     */
    public function addCandidate(\Objects\UserBundle\Entity\User $candidates)
    {
        $this->candidates[] = $candidates;
    
        return $this;
    }

    /**
     * Remove candidates
     *
     * @param \Objects\UserBundle\Entity\User $candidates
     */
    public function removeCandidate(\Objects\UserBundle\Entity\User $candidates)
    {
        $this->candidates->removeElement($candidates);
    }

    /**
     * Get candidates
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCandidates()
    {
        return $this->candidates;
    }
}