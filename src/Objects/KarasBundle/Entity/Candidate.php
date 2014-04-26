<?php

namespace Objects\KarasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidate
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Objects\KarasBundle\Entity\SlideRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Candidate
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
     * @ORM\ManyToOne(targetEntity="\Objects\UserBundle\Entity\User", inversedBy="candidates")
     */
    private $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="Job", inversedBy="candidates")
     */
    private $job;
    
    
    
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
     * Set user
     *
     * @param \Objects\UserBundle\Entity\User $user
     * @return Candidate
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

    /**
     * Set job
     *
     * @param \Objects\KarasBundle\Entity\Job $job
     * @return Candidate
     */
    public function setJob(\Objects\KarasBundle\Entity\Job $job = null)
    {
        $this->job = $job;
    
        return $this;
    }

    /**
     * Get job
     *
     * @return \Objects\KarasBundle\Entity\Job 
     */
    public function getJob()
    {
        return $this->job;
    }
}