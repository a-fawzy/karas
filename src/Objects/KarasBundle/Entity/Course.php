<?php

namespace Objects\KarasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Course
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Objects\KarasBundle\Entity\CourseRepository")
 */
class Course
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
     * @ORM\ManyToOne(targetEntity="\Objects\UserBundle\Entity\User", inversedBy="courses")
     */
    private $user;

    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="association", type="string", length=150)
     */
    private $association;

    /**
     * @var string
     *
     * @ORM\Column(name="certificate", type="string", length=150)
     */
    private $certificate;

    /**
     * @var string
     *
     * @ORM\Column(name="authority", type="string", length=150)
     */
    private $authority;

    /**
     * @var string
     *
     * @ORM\Column(name="license", type="string", length=50)
     */
    private $license;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="date")
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="date")
     */
    private $end;


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
     * Set name
     *
     * @param string $name
     * @return Course
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set association
     *
     * @param string $association
     * @return Course
     */
    public function setAssociation($association)
    {
        $this->association = $association;
    
        return $this;
    }

    /**
     * Get association
     *
     * @return string 
     */
    public function getAssociation()
    {
        return $this->association;
    }

    /**
     * Set certificate
     *
     * @param string $certificate
     * @return Course
     */
    public function setCertificate($certificate)
    {
        $this->certificate = $certificate;
    
        return $this;
    }

    /**
     * Get certificate
     *
     * @return string 
     */
    public function getCertificate()
    {
        return $this->certificate;
    }

    /**
     * Set authority
     *
     * @param string $authority
     * @return Course
     */
    public function setAuthority($authority)
    {
        $this->authority = $authority;
    
        return $this;
    }

    /**
     * Get authority
     *
     * @return string 
     */
    public function getAuthority()
    {
        return $this->authority;
    }

    /**
     * Set license
     *
     * @param string $license
     * @return Course
     */
    public function setLicense($license)
    {
        $this->license = $license;
    
        return $this;
    }

    /**
     * Get license
     *
     * @return string 
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     * @return Course
     */
    public function setStart($start)
    {
        $this->start = $start;
    
        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Course
     */
    public function setEnd($end)
    {
        $this->end = $end;
    
        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime 
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set user
     *
     * @param \Objects\UserBundle\Entity\User $user
     * @return Course
     */
    public function setUser(\Objects\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Objects\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}