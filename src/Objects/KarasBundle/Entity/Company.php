<?php

namespace Objects\KarasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Objects\KarasBundle\Entity\CompanyRepository")
 */
class Company
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="about", type="text")
     */
    private $about;

    /**
     * @var string $countryCode
     *
     * @ORM\Column(name="country_code", type="string", length=2, nullable=true)
     */
    private $countryCode;
    
    /**
     * @ORM\ManyToOne(targetEntity="Industry", inversedBy="companies")
     */
    private $industry;

    /**
     * @ORM\OneToOne(targetEntity="\Objects\UserBundle\Entity\User", inversedBy="company")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    private $user;
    
    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=20)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=20)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=150)
     */
    private $website;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="workFrom", type="time")
     */
    private $workFrom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="workTo", type="time")
     */
    private $workTo;

    /**
     * @var integer
     *
     * @ORM\Column(name="poBox", type="integer")
     */
    private $poBox;

    /**
     * @var boolean
     *
     * @ORM\Column(name="public", type="boolean", nullable=true)
     */
    private $public;

    /**
     * @var string
     *
     * @ORM\Column(name="contactName", type="string", length=255)
     */
    private $contactName;

    /**
     * @var string
     *
     * @ORM\Column(name="contactPosition", type="string", length=255)
     */
    private $contactPosition;

    /**
     * @var string
     *
     * @ORM\Column(name="contactEmail", type="string", length=255)
     */
    private $contactEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="contactPhone", type="string", length=20)
     */
    private $contactPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="contactMobile", type="string", length=20)
     */
    private $contactMobile;

    /**
     * @var string
     *
     * @ORM\Column(name="contactAddress", type="string", length=255)
     */
    private $contactAddress;


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
     * @return Company
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
     * Set about
     *
     * @param string $about
     * @return Company
     */
    public function setAbout($about)
    {
        $this->about = $about;
    
        return $this;
    }

    /**
     * Get about
     *
     * @return string 
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Company
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Company
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Company
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Company
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Company
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    
        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Company
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    
        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set workFrom
     *
     * @param \DateTime $workFrom
     * @return Company
     */
    public function setWorkFrom($workFrom)
    {
        $this->workFrom = $workFrom;
    
        return $this;
    }

    /**
     * Get workFrom
     *
     * @return \DateTime 
     */
    public function getWorkFrom()
    {
        return $this->workFrom;
    }

    /**
     * Set workTo
     *
     * @param \DateTime $workTo
     * @return Company
     */
    public function setWorkTo($workTo)
    {
        $this->workTo = $workTo;
    
        return $this;
    }

    /**
     * Get workTo
     *
     * @return \DateTime 
     */
    public function getWorkTo()
    {
        return $this->workTo;
    }

    /**
     * Set poBox
     *
     * @param integer $poBox
     * @return Company
     */
    public function setPoBox($poBox)
    {
        $this->poBox = $poBox;
    
        return $this;
    }

    /**
     * Get poBox
     *
     * @return integer 
     */
    public function getPoBox()
    {
        return $this->poBox;
    }

    /**
     * Set public
     *
     * @param boolean $public
     * @return Company
     */
    public function setPublic($public)
    {
        $this->public = $public;
    
        return $this;
    }

    /**
     * Get public
     *
     * @return boolean 
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Set contactName
     *
     * @param string $contactName
     * @return Company
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;
    
        return $this;
    }

    /**
     * Get contactName
     *
     * @return string 
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * Set contactPosition
     *
     * @param string $contactPosition
     * @return Company
     */
    public function setContactPosition($contactPosition)
    {
        $this->contactPosition = $contactPosition;
    
        return $this;
    }

    /**
     * Get contactPosition
     *
     * @return string 
     */
    public function getContactPosition()
    {
        return $this->contactPosition;
    }

    /**
     * Set contactEmail
     *
     * @param string $contactEmail
     * @return Company
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;
    
        return $this;
    }

    /**
     * Get contactEmail
     *
     * @return string 
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * Set contactPhone
     *
     * @param string $contactPhone
     * @return Company
     */
    public function setContactPhone($contactPhone)
    {
        $this->contactPhone = $contactPhone;
    
        return $this;
    }

    /**
     * Get contactPhone
     *
     * @return string 
     */
    public function getContactPhone()
    {
        return $this->contactPhone;
    }

    /**
     * Set contactMobile
     *
     * @param string $contactMobile
     * @return Company
     */
    public function setContactMobile($contactMobile)
    {
        $this->contactMobile = $contactMobile;
    
        return $this;
    }

    /**
     * Get contactMobile
     *
     * @return string 
     */
    public function getContactMobile()
    {
        return $this->contactMobile;
    }

    /**
     * Set contactAddress
     *
     * @param string $contactAddress
     * @return Company
     */
    public function setContactAddress($contactAddress)
    {
        $this->contactAddress = $contactAddress;
    
        return $this;
    }

    /**
     * Get contactAddress
     *
     * @return string 
     */
    public function getContactAddress()
    {
        return $this->contactAddress;
    }

    /**
     * Set countryCode
     *
     * @param string $countryCode
     * @return Company
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    
        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string 
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set industry
     *
     * @param \Objects\KarasBundle\Entity\Industry $industry
     * @return Company
     */
    public function setIndustry(\Objects\KarasBundle\Entity\Industry $industry = null)
    {
        $this->industry = $industry;
    
        return $this;
    }

    /**
     * Get industry
     *
     * @return \Objects\KarasBundle\Entity\Industry 
     */
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * Set user
     *
     * @param \Objects\UserBundle\Entity\User $user
     * @return Company
     */
    public function setUser(\Objects\UserBundle\Entity\User $user)
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
    
    public function __toString() {
        return (string) $this->name;
    }
}