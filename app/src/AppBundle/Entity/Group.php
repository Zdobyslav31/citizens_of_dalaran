<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Group
 *
 * @ORM\Table(name="group")
 * @ORM\Entity
 */
class Group
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="official_description", type="string", length=1000, nullable=true)
     */
    private $officialDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="informations", type="text", length=16777215, nullable=true)
     */
    private $informations;

    /**
     * @var string
     *
     * @ORM\Column(name="quests", type="text", length=16777215, nullable=true)
     */
    private $quests;

    /**
     * @var string
     *
     * @ORM\Column(name="resources", type="string", length=5000, nullable=true)
     */
    private $resources;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Character", inversedBy="group")
     * @ORM\JoinTable(name="group_has_character",
     *   joinColumns={
     *     @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="character_id", referencedColumnName="id")
     *   }
     * )
     */
    private $character;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->character = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Group
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
     * Set officialDescription
     *
     * @param string $officialDescription
     *
     * @return Group
     */
    public function setOfficialDescription($officialDescription)
    {
        $this->officialDescription = $officialDescription;

        return $this;
    }

    /**
     * Get officialDescription
     *
     * @return string
     */
    public function getOfficialDescription()
    {
        return $this->officialDescription;
    }

    /**
     * Set informations
     *
     * @param string $informations
     *
     * @return Group
     */
    public function setInformations($informations)
    {
        $this->informations = $informations;

        return $this;
    }

    /**
     * Get informations
     *
     * @return string
     */
    public function getInformations()
    {
        return $this->informations;
    }

    /**
     * Set quests
     *
     * @param string $quests
     *
     * @return Group
     */
    public function setQuests($quests)
    {
        $this->quests = $quests;

        return $this;
    }

    /**
     * Get quests
     *
     * @return string
     */
    public function getQuests()
    {
        return $this->quests;
    }

    /**
     * Set resources
     *
     * @param string $resources
     *
     * @return Group
     */
    public function setResources($resources)
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * Get resources
     *
     * @return string
     */
    public function getResources()
    {
        return $this->resources;
    }

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
     * Add character
     *
     * @param \AppBundle\Entity\Character $character
     *
     * @return Group
     */
    public function addCharacter(\AppBundle\Entity\Character $character)
    {
        $this->character[] = $character;

        return $this;
    }

    /**
     * Remove character
     *
     * @param \AppBundle\Entity\Character $character
     */
    public function removeCharacter(\AppBundle\Entity\Character $character)
    {
        $this->character->removeElement($character);
    }

    /**
     * Get character
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCharacter()
    {
        return $this->character;
    }
}
