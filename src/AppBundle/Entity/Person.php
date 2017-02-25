<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonRepository")
 */
class Person
{
    /**
     * @Assert\NotBlank()
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=500, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=5, nullable=true)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=45, nullable=true)
     */
    private $race;

    /**
     * @var integer
     *
     * @ORM\Column(name="firstShow", type="integer", nullable=true)
     */
    private $firstshow;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="person_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $personId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Quotation", inversedBy="person")
     * @ORM\JoinTable(name="person_has_quotation",
     *   joinColumns={
     *     @ORM\JoinColumn(name="person_id", referencedColumnName="person_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="quotation_id", referencedColumnName="quotation_id")
     *   }
     * )
     */
    private $quotation;

    /**
     * @ORM\ManyToMany(targetEntity="Number", mappedBy="choregraphers")
     */
    private $numbersChoregrapher;

    /**
     * @ORM\ManyToMany(targetEntity="Number", mappedBy="arrangers")
     */
    private $numbersArranger;

    /**
     * @ORM\ManyToMany(targetEntity="Number", mappedBy="director")
     */
    private $numbersDirector;

    /**
     * @ORM\ManyToMany(targetEntity="Number", mappedBy="performers")
     */
    private $numbersPerformer;

    /**
     * @ORM\ManyToMany(targetEntity="Number", mappedBy="figurants")
     */
    private $numbersFigurant;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User", inversedBy="person")
     * @ORM\JoinTable(name="person_has_editor",
     *   joinColumns={
     *     @ORM\JoinColumn(name="person_id", referencedColumnName="person_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="editors", referencedColumnName="id")
     *   }
     * )
     */
    private $editors;

    /**
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $date_creation;

    /**
     * @ORM\Column(name="last_update", type="datetime")
     */
    private $last_update;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->quotation = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Person
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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Person
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
     *
     * @return Person
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
     * Set gender
     *
     * @param string $gender
     *
     * @return Person
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
     * Set race
     *
     * @param string $race
     *
     * @return Person
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set firstshow
     *
     * @param integer $firstshow
     *
     * @return Person
     */
    public function setFirstshow($firstshow)
    {
        $this->firstshow = $firstshow;

        return $this;
    }

    /**
     * Get firstshow
     *
     * @return integer
     */
    public function getFirstshow()
    {
        return $this->firstshow;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Person
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
     * Get personId
     *
     * @return integer
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * Add quotation
     *
     * @param \AppBundle\Entity\Quotation $quotation
     *
     * @return Person
     */
    public function addQuotation(\AppBundle\Entity\Quotation $quotation)
    {
        $this->quotation[] = $quotation;

        return $this;
    }

    /**
     * Remove quotation
     *
     * @param \AppBundle\Entity\Quotation $quotation
     */
    public function removeQuotation(\AppBundle\Entity\Quotation $quotation)
    {
        $this->quotation->removeElement($quotation);
    }

    /**
     * Get quotation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuotation()
    {
        return $this->quotation;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEditors()
    {
        return $this->editors;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $editors
     */
    public function setEditors($editors)
    {
        $this->editors = $editors;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * @param mixed $date_creation
     */
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;
    }

    /**
     * @return mixed
     */
    public function getLastUpdate()
    {
        return $this->last_update;
    }

    /**
     * @param mixed $last_update
     */
    public function setLastUpdate($last_update)
    {
        $this->last_update = $last_update;
    }

    /**
     * @return mixed
     */
    public function getNumbersChoregrapher()
    {
        return $this->numbersChoregrapher;
    }

    /**
     * @param mixed $numbersChoregrapher
     */
    public function setNumbersChoregrapher($numbersChoregrapher)
    {
        $this->numbersChoregrapher = $numbersChoregrapher;
    }

    /**
     * @return mixed
     */
    public function getNumbersArranger()
    {
        return $this->numbersArranger;
    }

    /**
     * @param mixed $numbersArranger
     */
    public function setNumbersArranger($numbersArranger)
    {
        $this->numbersArranger = $numbersArranger;
    }

    /**
     * @return mixed
     */
    public function getNumbersDirector()
    {
        return $this->numbersDirector;
    }

    /**
     * @param mixed $numbersDirector
     */
    public function setNumbersDirector($numbersDirector)
    {
        $this->numbersDirector = $numbersDirector;
    }

    /**
     * @return mixed
     */
    public function getNumbersPerformer()
    {
        return $this->numbersPerformer;
    }

    /**
     * @param mixed $numbersPerformer
     */
    public function setNumbersPerformer($numbersPerformer)
    {
        $this->numbersPerformer = $numbersPerformer;
    }

    /**
     * @return mixed
     */
    public function getNumbersFigurant()
    {
        return $this->numbersFigurant;
    }

    /**
     * @param mixed $numbersFigurant
     */
    public function setNumbersFigurant($numbersFigurant)
    {
        $this->numbersFigurant = $numbersFigurant;
    }




}
