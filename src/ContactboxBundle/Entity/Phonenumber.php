<?php

namespace ContactboxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phonenumber
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ContactboxBundle\Entity\PhonenumberRepository")
 */
class Phonenumber
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
     * @var integer
     *
     * @ORM\Column(name="phoneNumber", type="bigint")
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneType", type="string", length=60)
     */
    private $phoneType;

    /**
     * @ORM\ManyToOne(targetEntity="Contact", inversedBy="phoneNumber")
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
     * Set phoneNumber
     *
     * @param integer $phoneNumber
     * @return Phonenumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return integer 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set phoneType
     *
     * @param string $phoneType
     * @return Phonenumber
     */
    public function setPhoneType($phoneType)
    {
        $this->phoneType = $phoneType;

        return $this;
    }

    /**
     * Get phoneType
     *
     * @return string 
     */
    public function getPhoneType()
    {
        return $this->phoneType;
    }

    /**
     * Set contact
     *
     * @param \ContactboxBundle\Entity\Contact $contact
     * @return Phonenumber
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
