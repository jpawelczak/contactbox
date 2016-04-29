<?php

namespace ContactboxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ContactboxBundle\Entity\ContactRepository")
 */
class Contact
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
     * @ORM\Column(name="firstname", type="string", length=255)
     * @Assert\NotBlank
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     * @Assert\NotBlank
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Address", mappedBy="contact")
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity="Phonenumber", mappedBy="contact")
     */
    private $phoneNumber;

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
     * Set firstname
     *
     * @param string $firstname
     * @return Contact
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Contact
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Contact
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
     * Constructor
     */
    public function __construct()
    {
        $this->address = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add address
     *
     * @param \ContactboxBundle\Entity\Address $address
     * @return Contact
     */
    public function addAddress(\ContactboxBundle\Entity\Address $address)
    {
        $this->address[] = $address;

        return $this;
    }

    /**
     * Remove address
     *
     * @param \ContactboxBundle\Entity\Address $address
     */
    public function removeAddress(\ContactboxBundle\Entity\Address $address)
    {
        $this->address->removeElement($address);
    }

    /**
     * Get address
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add phoneNumber
     *
     * @param \ContactboxBundle\Entity\Phonenumber $phoneNumber
     * @return Contact
     */
    public function addPhoneNumber(\ContactboxBundle\Entity\Phonenumber $phoneNumber)
    {
        $this->phoneNumber[] = $phoneNumber;

        return $this;
    }

    /**
     * Remove phoneNumber
     *
     * @param \ContactboxBundle\Entity\Phonenumber $phoneNumber
     */
    public function removePhoneNumber(\ContactboxBundle\Entity\Phonenumber $phoneNumber)
    {
        $this->phoneNumber->removeElement($phoneNumber);
    }

    /**
     * Get phoneNumber
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
}
