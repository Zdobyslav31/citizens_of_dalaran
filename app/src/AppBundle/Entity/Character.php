<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Character
 *
 * @ORM\Table(
 *     name="character",
 *     indexes={
 *      @ORM\Index(name="fk_events_has_users_users1_idx", columns={"users_id"}),
 *      @ORM\Index(name="fk_events_has_users_events1_idx", columns={"events_id"})
 *     }
 * )
 * @ORM\Entity
 */
class Character
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
     * @ORM\Column(name="race", type="string", length=45, nullable=true)
     */
    private $race;

    /**
     * @var string
     *
     * @ORM\Column(name="class", type="string", length=45, nullable=true)
     */
    private $class;

    /**
     * @var string
     *
     * @ORM\Column(name="story", type="text", length=16777215, nullable=true)
     */
    private $story;

    /**
     * @var string
     *
     * @ORM\Column(name="quests", type="text", length=16777215, nullable=true)
     */
    private $quests;

    /**
     * @var string
     *
     * @ORM\Column(name="informations", type="text", length=16777215, nullable=true)
     */
    private $informations;

    /**
     * @var string
     *
     * @ORM\Column(name="resources", type="string", length=5000, nullable=true)
     */
    private $resources;

    /**
     * @var string
     *
     * @ORM\Column(name="official_info", type="string", length=1000, nullable=true)
     */
    private $officialInfo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Event
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Event")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="events_id", referencedColumnName="id")
     * })
     */
    private $events;

    /**
     * @var \UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     * })
     */
    private $users;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Group", mappedBy="character")
     */
    private $group;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->group = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Character
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
     * Set race
     *
     * @param string $race
     *
     * @return Character
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
     * Set class
     *
     * @param string $class
     *
     * @return Character
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set story
     *
     * @param string $story
     *
     * @return Character
     */
    public function setStory($story)
    {
        $this->story = $story;

        return $this;
    }

    /**
     * Get story
     *
     * @return string
     */
    public function getStory()
    {
        return $this->story;
    }

    /**
     * Set quests
     *
     * @param string $quests
     *
     * @return Character
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
     * Set informations
     *
     * @param string $informations
     *
     * @return Character
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
     * Set resources
     *
     * @param string $resources
     *
     * @return Character
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
     * Set officialInfo
     *
     * @param string $officialInfo
     *
     * @return Character
     */
    public function setOfficialInfo($officialInfo)
    {
        $this->officialInfo = $officialInfo;

        return $this;
    }

    /**
     * Get officialInfo
     *
     * @return string
     */
    public function getOfficialInfo()
    {
        return $this->officialInfo;
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
     * Set events
     *
     * @param \AppBundle\Entity\Event $events
     *
     * @return Character
     */
    public function setEvents(\AppBundle\Entity\Event $events = null)
    {
        $this->events = $events;

        return $this;
    }

    /**
     * Get events
     *
     * @return \AppBundle\Entity\Event
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Set users
     *
     * @param \UserBundle\Entity\User $users
     *
     * @return Character
     */
    public function setUsers(\UserBundle\Entity\User $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \UserBundle\Entity\User
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add group
     *
     * @param \AppBundle\Entity\Group $group
     *
     * @return Character
     */
    public function addGroup(\AppBundle\Entity\Group $group)
    {
        $this->group[] = $group;

        return $this;
    }

    /**
     * Remove group
     *
     * @param \AppBundle\Entity\Group $group
     */
    public function removeGroup(\AppBundle\Entity\Group $group)
    {
        $this->group->removeElement($group);
    }

    /**
     * Get group
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroup()
    {
        return $this->group;
    }
}
