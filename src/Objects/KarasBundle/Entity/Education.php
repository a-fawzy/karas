<?php

namespace Objects\KarasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Education
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Objects\KarasBundle\Entity\EducationRepository")
 */
class Education
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
     * @ORM\Column(name="name", type="string", length=150)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="start", type="integer")
     */
    private $start;

    /**
     * @var integer
     *
     * @ORM\Column(name="end", type="integer")
     */
    private $end;

    /**
     * @var string
     *
     * @ORM\Column(name="field", type="string", length=150)
     */
    private $field;

    /**
     * @var string
     *
     * @ORM\Column(name="grade", type="string", length=150)
     */
    private $grade;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


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
     * @return Education
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
     * Set start
     *
     * @param integer $start
     * @return Education
     */
    public function setStart($start)
    {
        $this->start = $start;
    
        return $this;
    }

    /**
     * Get start
     *
     * @return integer 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param integer $end
     * @return Education
     */
    public function setEnd($end)
    {
        $this->end = $end;
    
        return $this;
    }

    /**
     * Get end
     *
     * @return integer 
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set field
     *
     * @param string $field
     * @return Education
     */
    public function setField($field)
    {
        $this->field = $field;
    
        return $this;
    }

    /**
     * Get field
     *
     * @return string 
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set grade
     *
     * @param string $grade
     * @return Education
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    
        return $this;
    }

    /**
     * Get grade
     *
     * @return string 
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Education
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
}