<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(
 *     name="event",
 *     indexes={
 *      @ORM\Index(
 *          name="fk_events_tags1_idx",
 *          columns={"tags_id"}
 *      ),
 *      @ORM\Index(
 *          name="fk_events_application1_idx",
 *          columns={"template_application_id"}
 *      )
 *     }
 * )
 * @ORM\Entity(
 *     repositoryClass="AppBundle\Repository\EventRepository"
 * )
 */
class Event
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=127, nullable=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_start", type="date", nullable=false)
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="date", nullable=false)
     */
    private $dateEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="location_link", type="string", length=255, nullable=true)
     */
    private $locationLink;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="string", length=1000, nullable=false)
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=16777215, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=true)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=127, nullable=true)
     */
    private $img;

    /**
     * @var boolean
     *
     * @ORM\Column(name="displayed_main", type="boolean", nullable=false)
     */
    private $displayedMain;

    /**
     * @var integer
     *
     * @ORM\Column(name="participants_limit", type="integer", nullable=true)
     */
    private $participantsLimit;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Application
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Application")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="template_application_id", referencedColumnName="id")
     * })
     */
    private $templateApplication;

    /**
     * @var \AppBundle\Entity\Tag
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tag")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tags_id", referencedColumnName="id")
     * })
     */
    private $tags;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Event
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
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return Event
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     *
     * @return Event
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Event
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set locationLink
     *
     * @param string $locationLink
     *
     * @return Event
     */
    public function setLocationLink($locationLink)
    {
        $this->locationLink = $locationLink;

        return $this;
    }

    /**
     * Get locationLink
     *
     * @return string
     */
    public function getLocationLink()
    {
        return $this->locationLink;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return Event
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Event
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
     * Set price
     *
     * @param float $price
     *
     * @return Event
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set img
     *
     * @param string $img
     *
     * @return Event
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set displayedMain
     *
     * @param boolean $displayedMain
     *
     * @return Event
     */
    public function setDisplayedMain($displayedMain)
    {
        $this->displayedMain = $displayedMain;

        return $this;
    }

    /**
     * Get displayedMain
     *
     * @return boolean
     */
    public function getDisplayedMain()
    {
        return $this->displayedMain;
    }

    /**
     * Set participantsLimit
     *
     * @param integer $participantsLimit
     *
     * @return Event
     */
    public function setParticipantsLimit($participantsLimit)
    {
        $this->participantsLimit = $participantsLimit;

        return $this;
    }

    /**
     * Get participantsLimit
     *
     * @return integer
     */
    public function getParticipantsLimit()
    {
        return $this->participantsLimit;
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
     * Set templateApplication
     *
     * @param \AppBundle\Entity\Application $templateApplication
     *
     * @return Event
     */
    public function setTemplateApplication(\AppBundle\Entity\Application $templateApplication = null)
    {
        $this->templateApplication = $templateApplication;

        return $this;
    }

    /**
     * Get templateApplication
     *
     * @return \AppBundle\Entity\Application
     */
    public function getTemplateApplication()
    {
        return $this->templateApplication;
    }

    /**
     * Set tags
     *
     * @param \AppBundle\Entity\Tag $tags
     *
     * @return Event
     */
    public function setTags(\AppBundle\Entity\Tag $tags = null)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return \AppBundle\Entity\Tag
     */
    public function getTags()
    {
        return $this->tags;
    }
}
