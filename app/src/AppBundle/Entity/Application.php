<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Application
 *
 * @ORM\Table(
 *     name="application",
 *     indexes={
 *      @ORM\Index(name="fk_users_has_events_events1_idx", columns={"events_id"}),
 *      @ORM\Index(name="fk_users_has_events_users1_idx", columns={"users_id"})
 *     }
 * )
 * @ORM\Entity
 */
class Application
{
    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=45, nullable=true)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="transport", type="string", length=255, nullable=true)
     */
    private $transport;

    /**
     * @var string
     *
     * @ORM\Column(name="accommodtion_remarks", type="string", length=255, nullable=true)
     */
    private $accommodtionRemarks;

    /**
     * @var string
     *
     * @ORM\Column(name="organization_remarks", type="string", length=255, nullable=true)
     */
    private $organizationRemarks;

    /**
     * @var string
     *
     * @ORM\Column(name="costume_needs", type="string", length=255, nullable=true)
     */
    private $costumeNeeds;

    /**
     * @var string
     *
     * @ORM\Column(name="weapon_needs", type="string", length=255, nullable=true)
     */
    private $weaponNeeds;

    /**
     * @var string
     *
     * @ORM\Column(name="lore_needs", type="string", length=255, nullable=true)
     */
    private $loreNeeds;

    /**
     * @var integer
     *
     * @ORM\Column(name="lore_knowledge", type="integer", nullable=true)
     */
    private $loreKnowledge;

    /**
     * @var string
     *
     * @ORM\Column(name="interaction_preferences", type="string", length=255, nullable=true)
     */
    private $interactionPreferences;

    /**
     * @var string
     *
     * @ORM\Column(name="character_name", type="string", length=45, nullable=true)
     */
    private $characterName;

    /**
     * @var string
     *
     * @ORM\Column(name="character_race", type="string", length=45, nullable=true)
     */
    private $characterRace;

    /**
     * @var string
     *
     * @ORM\Column(name="character_class", type="string", length=45, nullable=true)
     */
    private $characterClass;

    /**
     * @var string
     *
     * @ORM\Column(name="character_title", type="string", length=45, nullable=true)
     */
    private $characterTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="character_age", type="string", length=45, nullable=true)
     */
    private $characterAge;

    /**
     * @var string
     *
     * @ORM\Column(name="faction", type="string", length=45, nullable=true)
     */
    private $faction;

    /**
     * @var string
     *
     * @ORM\Column(name="faction_2", type="string", length=45, nullable=true)
     */
    private $faction2;

    /**
     * @var string
     *
     * @ORM\Column(name="commandment_preferences", type="string", length=45, nullable=true)
     */
    private $commandmentPreferences;

    /**
     * @var integer
     *
     * @ORM\Column(name="character_militancy", type="integer", nullable=true)
     */
    private $characterMilitancy;

    /**
     * @var integer
     *
     * @ORM\Column(name="character_cunning", type="integer", nullable=true)
     */
    private $characterCunning;

    /**
     * @var string
     *
     * @ORM\Column(name="character_story", type="text", length=16777215, nullable=true)
     */
    private $characterStory;

    /**
     * @var string
     *
     * @ORM\Column(name="character_nature", type="string", length=5000, nullable=true)
     */
    private $characterNature;

    /**
     * @var string
     *
     * @ORM\Column(name="character_connections", type="string", length=5000, nullable=true)
     */
    private $characterConnections;

    /**
     * @var string
     *
     * @ORM\Column(name="rumours", type="string", length=1000, nullable=true)
     */
    private $rumours;

    /**
     * @var string
     *
     * @ORM\Column(name="larping_preferences", type="string", length=1000, nullable=true)
     */
    private $larpingPreferences;

    /**
     * @var string
     *
     * @ORM\Column(name="additional_remarks", type="string", length=5000, nullable=true)
     */
    private $additionalRemarks;

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
     * Set role
     *
     * @param string $role
     *
     * @return Application
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set transport
     *
     * @param string $transport
     *
     * @return Application
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;

        return $this;
    }

    /**
     * Get transport
     *
     * @return string
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * Set accommodtionRemarks
     *
     * @param string $accommodtionRemarks
     *
     * @return Application
     */
    public function setAccommodtionRemarks($accommodtionRemarks)
    {
        $this->accommodtionRemarks = $accommodtionRemarks;

        return $this;
    }

    /**
     * Get accommodtionRemarks
     *
     * @return string
     */
    public function getAccommodtionRemarks()
    {
        return $this->accommodtionRemarks;
    }

    /**
     * Set organizationRemarks
     *
     * @param string $organizationRemarks
     *
     * @return Application
     */
    public function setOrganizationRemarks($organizationRemarks)
    {
        $this->organizationRemarks = $organizationRemarks;

        return $this;
    }

    /**
     * Get organizationRemarks
     *
     * @return string
     */
    public function getOrganizationRemarks()
    {
        return $this->organizationRemarks;
    }

    /**
     * Set costumeNeeds
     *
     * @param string $costumeNeeds
     *
     * @return Application
     */
    public function setCostumeNeeds($costumeNeeds)
    {
        $this->costumeNeeds = $costumeNeeds;

        return $this;
    }

    /**
     * Get costumeNeeds
     *
     * @return string
     */
    public function getCostumeNeeds()
    {
        return $this->costumeNeeds;
    }

    /**
     * Set weaponNeeds
     *
     * @param string $weaponNeeds
     *
     * @return Application
     */
    public function setWeaponNeeds($weaponNeeds)
    {
        $this->weaponNeeds = $weaponNeeds;

        return $this;
    }

    /**
     * Get weaponNeeds
     *
     * @return string
     */
    public function getWeaponNeeds()
    {
        return $this->weaponNeeds;
    }

    /**
     * Set loreNeeds
     *
     * @param string $loreNeeds
     *
     * @return Application
     */
    public function setLoreNeeds($loreNeeds)
    {
        $this->loreNeeds = $loreNeeds;

        return $this;
    }

    /**
     * Get loreNeeds
     *
     * @return string
     */
    public function getLoreNeeds()
    {
        return $this->loreNeeds;
    }

    /**
     * Set loreKnowledge
     *
     * @param integer $loreKnowledge
     *
     * @return Application
     */
    public function setLoreKnowledge($loreKnowledge)
    {
        $this->loreKnowledge = $loreKnowledge;

        return $this;
    }

    /**
     * Get loreKnowledge
     *
     * @return integer
     */
    public function getLoreKnowledge()
    {
        return $this->loreKnowledge;
    }

    /**
     * Set interactionPreferences
     *
     * @param string $interactionPreferences
     *
     * @return Application
     */
    public function setInteractionPreferences($interactionPreferences)
    {
        $this->interactionPreferences = $interactionPreferences;

        return $this;
    }

    /**
     * Get interactionPreferences
     *
     * @return string
     */
    public function getInteractionPreferences()
    {
        return $this->interactionPreferences;
    }

    /**
     * Set characterName
     *
     * @param string $characterName
     *
     * @return Application
     */
    public function setCharacterName($characterName)
    {
        $this->characterName = $characterName;

        return $this;
    }

    /**
     * Get characterName
     *
     * @return string
     */
    public function getCharacterName()
    {
        return $this->characterName;
    }

    /**
     * Set characterRace
     *
     * @param string $characterRace
     *
     * @return Application
     */
    public function setCharacterRace($characterRace)
    {
        $this->characterRace = $characterRace;

        return $this;
    }

    /**
     * Get characterRace
     *
     * @return string
     */
    public function getCharacterRace()
    {
        return $this->characterRace;
    }

    /**
     * Set characterClass
     *
     * @param string $characterClass
     *
     * @return Application
     */
    public function setCharacterClass($characterClass)
    {
        $this->characterClass = $characterClass;

        return $this;
    }

    /**
     * Get characterClass
     *
     * @return string
     */
    public function getCharacterClass()
    {
        return $this->characterClass;
    }

    /**
     * Set characterTitle
     *
     * @param string $characterTitle
     *
     * @return Application
     */
    public function setCharacterTitle($characterTitle)
    {
        $this->characterTitle = $characterTitle;

        return $this;
    }

    /**
     * Get characterTitle
     *
     * @return string
     */
    public function getCharacterTitle()
    {
        return $this->characterTitle;
    }

    /**
     * Set characterAge
     *
     * @param string $characterAge
     *
     * @return Application
     */
    public function setCharacterAge($characterAge)
    {
        $this->characterAge = $characterAge;

        return $this;
    }

    /**
     * Get characterAge
     *
     * @return string
     */
    public function getCharacterAge()
    {
        return $this->characterAge;
    }

    /**
     * Set faction
     *
     * @param string $faction
     *
     * @return Application
     */
    public function setFaction($faction)
    {
        $this->faction = $faction;

        return $this;
    }

    /**
     * Get faction
     *
     * @return string
     */
    public function getFaction()
    {
        return $this->faction;
    }

    /**
     * Set faction2
     *
     * @param string $faction2
     *
     * @return Application
     */
    public function setFaction2($faction2)
    {
        $this->faction2 = $faction2;

        return $this;
    }

    /**
     * Get faction2
     *
     * @return string
     */
    public function getFaction2()
    {
        return $this->faction2;
    }

    /**
     * Set commandmentPreferences
     *
     * @param string $commandmentPreferences
     *
     * @return Application
     */
    public function setCommandmentPreferences($commandmentPreferences)
    {
        $this->commandmentPreferences = $commandmentPreferences;

        return $this;
    }

    /**
     * Get commandmentPreferences
     *
     * @return string
     */
    public function getCommandmentPreferences()
    {
        return $this->commandmentPreferences;
    }

    /**
     * Set characterMilitancy
     *
     * @param integer $characterMilitancy
     *
     * @return Application
     */
    public function setCharacterMilitancy($characterMilitancy)
    {
        $this->characterMilitancy = $characterMilitancy;

        return $this;
    }

    /**
     * Get characterMilitancy
     *
     * @return integer
     */
    public function getCharacterMilitancy()
    {
        return $this->characterMilitancy;
    }

    /**
     * Set characterCunning
     *
     * @param integer $characterCunning
     *
     * @return Application
     */
    public function setCharacterCunning($characterCunning)
    {
        $this->characterCunning = $characterCunning;

        return $this;
    }

    /**
     * Get characterCunning
     *
     * @return integer
     */
    public function getCharacterCunning()
    {
        return $this->characterCunning;
    }

    /**
     * Set characterStory
     *
     * @param string $characterStory
     *
     * @return Application
     */
    public function setCharacterStory($characterStory)
    {
        $this->characterStory = $characterStory;

        return $this;
    }

    /**
     * Get characterStory
     *
     * @return string
     */
    public function getCharacterStory()
    {
        return $this->characterStory;
    }

    /**
     * Set characterNature
     *
     * @param string $characterNature
     *
     * @return Application
     */
    public function setCharacterNature($characterNature)
    {
        $this->characterNature = $characterNature;

        return $this;
    }

    /**
     * Get characterNature
     *
     * @return string
     */
    public function getCharacterNature()
    {
        return $this->characterNature;
    }

    /**
     * Set characterConnections
     *
     * @param string $characterConnections
     *
     * @return Application
     */
    public function setCharacterConnections($characterConnections)
    {
        $this->characterConnections = $characterConnections;

        return $this;
    }

    /**
     * Get characterConnections
     *
     * @return string
     */
    public function getCharacterConnections()
    {
        return $this->characterConnections;
    }

    /**
     * Set rumours
     *
     * @param string $rumours
     *
     * @return Application
     */
    public function setRumours($rumours)
    {
        $this->rumours = $rumours;

        return $this;
    }

    /**
     * Get rumours
     *
     * @return string
     */
    public function getRumours()
    {
        return $this->rumours;
    }

    /**
     * Set larpingPreferences
     *
     * @param string $larpingPreferences
     *
     * @return Application
     */
    public function setLarpingPreferences($larpingPreferences)
    {
        $this->larpingPreferences = $larpingPreferences;

        return $this;
    }

    /**
     * Get larpingPreferences
     *
     * @return string
     */
    public function getLarpingPreferences()
    {
        return $this->larpingPreferences;
    }

    /**
     * Set additionalRemarks
     *
     * @param string $additionalRemarks
     *
     * @return Application
     */
    public function setAdditionalRemarks($additionalRemarks)
    {
        $this->additionalRemarks = $additionalRemarks;

        return $this;
    }

    /**
     * Get additionalRemarks
     *
     * @return string
     */
    public function getAdditionalRemarks()
    {
        return $this->additionalRemarks;
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
     * @return Application
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
     * @param \AppBundle\Entity\User $users
     *
     * @return Application
     */
    public function setUsers(\AppBundle\Entity\User $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \AppBundle\Entity\User
     */
    public function getUsers()
    {
        return $this->users;
    }
}
