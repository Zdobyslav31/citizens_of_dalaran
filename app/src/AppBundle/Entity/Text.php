<?php
/**
 * Text entity.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Static Text
 *
 * @ORM\Table(
 *     name="text",
 * )
 * @ORM\Entity(
 *     repositoryClass="AppBundle\Repository\TextRepository"
 * )
 */
class Text
{
    const NUM_ITEMS = 10;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="255",
     * )
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="parent_title", type="string", length=255, nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="255",
     * )
     */
    private $parentTitle;

    /**
     * @var float
     *
     * @ORM\Column(name="number", type="float", nullable=false)
     * @Assert\NotBlank
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=16777215, nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="16777215",
     * )
     */
    private $content;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Image(
     *     maxWidth="2500",
     *     maxHeight="2500"
     * )
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="img_description", type="string", length=1000, nullable=true)
     * @Assert\Length(
     *     min="3",
     *     max="1000",
     * )
     */
    private $imgDescription;

    /**
     * @var integer
     *
     * @ORM\Column(
     *     name="id",
     *     type="integer",
     *     nullable=false,
     *     options={"unsigned"=true},
     * )
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Text
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Text
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Text
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set imgDescription
     *
     * @param string $imgDescription
     *
     * @return Text
     */
    public function setImgDescription($imgDescription)
    {
        $this->imgDescription = $imgDescription;

        return $this;
    }

    /**
     * Get imgDescription
     *
     * @return string
     */
    public function getImgDescription()
    {
        return $this->imgDescription;
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
     * Set parentTitle
     *
     * @param string $parentTitle
     *
     * @return Text
     */
    public function setParentTitle($parentTitle)
    {
        $this->parentTitle = $parentTitle;

        return $this;
    }

    /**
     * Get parentTitle
     *
     * @return string
     */
    public function getParentTitle()
    {
        return $this->parentTitle;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Text
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }
}
