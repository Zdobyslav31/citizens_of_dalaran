<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relationship
 *
 * @ORM\Table(name="relationship", indexes={@ORM\Index(name="fk_character_has_character_character2_idx", columns={"character_2"}), @ORM\Index(name="fk_character_has_character_character1_idx", columns={"character_1"})})
 * @ORM\Entity
 */
class Relationship
{
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="description_to_1", type="string", length=1000, nullable=true)
     */
    private $descriptionTo1;

    /**
     * @var string
     *
     * @ORM\Column(name="description_to_2", type="string", length=1000, nullable=true)
     */
    private $descriptionTo2;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible_to_1", type="boolean", nullable=false)
     */
    private $visibleTo1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible_to_2", type="boolean", nullable=false)
     */
    private $visibleTo2;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Character
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Character")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="character_1", referencedColumnName="id")
     * })
     */
    private $character1;

    /**
     * @var \AppBundle\Entity\Character
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Character")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="character_2", referencedColumnName="id")
     * })
     */
    private $character2;



    /**
     * Set type
     *
     * @param string $type
     *
     * @return Relationship
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
     * Set description
     *
     * @param string $description
     *
     * @return Relationship
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
     * Set descriptionTo1
     *
     * @param string $descriptionTo1
     *
     * @return Relationship
     */
    public function setDescriptionTo1($descriptionTo1)
    {
        $this->descriptionTo1 = $descriptionTo1;

        return $this;
    }

    /**
     * Get descriptionTo1
     *
     * @return string
     */
    public function getDescriptionTo1()
    {
        return $this->descriptionTo1;
    }

    /**
     * Set descriptionTo2
     *
     * @param string $descriptionTo2
     *
     * @return Relationship
     */
    public function setDescriptionTo2($descriptionTo2)
    {
        $this->descriptionTo2 = $descriptionTo2;

        return $this;
    }

    /**
     * Get descriptionTo2
     *
     * @return string
     */
    public function getDescriptionTo2()
    {
        return $this->descriptionTo2;
    }

    /**
     * Set visibleTo1
     *
     * @param boolean $visibleTo1
     *
     * @return Relationship
     */
    public function setVisibleTo1($visibleTo1)
    {
        $this->visibleTo1 = $visibleTo1;

        return $this;
    }

    /**
     * Get visibleTo1
     *
     * @return boolean
     */
    public function getVisibleTo1()
    {
        return $this->visibleTo1;
    }

    /**
     * Set visibleTo2
     *
     * @param boolean $visibleTo2
     *
     * @return Relationship
     */
    public function setVisibleTo2($visibleTo2)
    {
        $this->visibleTo2 = $visibleTo2;

        return $this;
    }

    /**
     * Get visibleTo2
     *
     * @return boolean
     */
    public function getVisibleTo2()
    {
        return $this->visibleTo2;
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
     * Set character1
     *
     * @param \AppBundle\Entity\Character $character1
     *
     * @return Relationship
     */
    public function setCharacter1(\AppBundle\Entity\Character $character1 = null)
    {
        $this->character1 = $character1;

        return $this;
    }

    /**
     * Get character1
     *
     * @return \AppBundle\Entity\Character
     */
    public function getCharacter1()
    {
        return $this->character1;
    }

    /**
     * Set character2
     *
     * @param \AppBundle\Entity\Character $character2
     *
     * @return Relationship
     */
    public function setCharacter2(\AppBundle\Entity\Character $character2 = null)
    {
        $this->character2 = $character2;

        return $this;
    }

    /**
     * Get character2
     *
     * @return \AppBundle\Entity\Character
     */
    public function getCharacter2()
    {
        return $this->character2;
    }
}
