<?php

namespace Objects\KarasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Slide
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Objects\KarasBundle\Entity\SlideRepository")
 */
class Slide
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
