<?php

namespace ContactboxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ContactboxBundle\Entity\AddressRepository")
 */
class Address
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
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="homeNumber", type="string", length=10)
     */
    private $homeNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="flatNumber", type="string", length=10)
     */
    private $flatNumber;

    /**
     * @ORM\ManyToOne(targetEntity="Contact", inversedBy="address")
     */
    private $contact;

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
     * Set city
     *
     * @param string $city
     * @return Address
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
     * Set street
     *
     * @param string $street
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set homeNumber
     *
     * @param integer $homeNumber
     * @return Address
     */
    public function setHomeNumber($homeNumber)
    {
        $this->homeNumber = $homeNumber;

        return $this;
    }

    /**
     * Get homeNumber
     *
     * @return integer 
     */
    public function getHomeNumber()
    {
        return $this->homeNumber;
    }

    /**
     * Set flatNumber
     *
     * @param integer $flatNumber
     * @return Address
     */
    public function setFlatNumber($flatNumber)
    {
        $this->flatNumber = $flatNumber;

        return $this;
    }

    /**
     * Get flatNumber
     *
     * @return integer 
     */
    public function getFlatNumber()
    {
        return $this->flatNumber;
    }

    /**
     * Set contact
     *
     * @param \ContactboxBundle\Entity\Contact $contact
     * @return Address
     */
    public function setContact(\ContactboxBundle\Entity\Contact $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \ContactboxBundle\Entity\Contact 
     */
    public function getContact()
    {
        return $this->contact;
    }
}
