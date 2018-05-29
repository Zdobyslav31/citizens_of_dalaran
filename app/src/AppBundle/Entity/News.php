<?php
/**
 * News entity.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * News
 *
 * @ORM\Table(
 *     name="news",
 *     indexes={
 *          @ORM\Index(name="fk_news_users1_idx", columns={"creator_id"}),
 *          @ORM\Index(name="fk_news_users2_idx", columns={"modifier_id"})
 *     }
 * )
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(
 *     repositoryClass="AppBundle\Repository\NewsRepository"
 * )
 */
class News
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
     * @var \DateTime
     *
     * @ORM\Column(name="modified_date", type="datetime", nullable=true)
     * @Gedmo\Timestampable(
     *     on="update",
     * )
     */
    private $modifiedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     * @Gedmo\Timestampable(
     *     on="create",
     * )
     */
    private $createdDate;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="string", length=1000, nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="1000",
     * )
     */
    private $summary;

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
     *     maxSize="2048k",
     *     maxWidth="2500",
     *     maxHeight="2500",
     *     allowPortrait=false
     * )
     */
    protected $imageFile;


    // for temporary storage
    private $tempImagePath;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $imagePath;

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
     * @var \UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="creator_id", referencedColumnName="id")
     * })
     * @Assert\NotBlank
     */
    private $creator;

    /**
     * @var \UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifier_id", referencedColumnName="id")
     * })
     */
    private $modifier;

    /**
     * Many News have Many Tags.
     * @var \Doctrine\Common\Collections\ArrayCollection $tags
     * @ORM\ManyToMany(
     *     targetEntity="Tag",
     *     inversedBy="news",
     *     cascade={"persist"})
     * @ORM\JoinTable(name="news_has_tags")
     * @ORM\JoinColumn(name="tag_id", referencedColumnName="id", nullable=false, onDelete="cascade")
     *
     */
    private $tags;

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
     * @return News
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
     * Set modifiedDate
     *
     * @param \DateTime $modifiedDate
     *
     * @return News
     */
    public function setModifiedDate($modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;

        return $this;
    }

    /**
     * Get modifiedDate
     *
     * @return \DateTime
     */
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return News
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return News
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
     * Set content
     *
     * @param string $content
     *
     * @return News
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set creator
     *
     * @param \UserBundle\Entity\User $creator
     *
     * @return News
     */
    public function setCreator(\UserBundle\Entity\User $creator = null)
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * Get creator
     *
     * @return \UserBundle\Entity\User
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * Set modifier
     *
     * @param \UserBundle\Entity\User $modifier
     *
     * @return News
     */
    public function setModifier(\UserBundle\Entity\User $modifier = null)
    {
        $this->modifier = $modifier;

        return $this;
    }

    /**
     * Get modifier
     *
     * @return \UserBundle\Entity\User
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * Add tag
     *
     * @param \AppBundle\Entity\Tag $tag
     *
     * @return News
     */
    public function addTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \AppBundle\Entity\Tag $tag
     */
    public function removeTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }


    /**
     * Sets the file used for image uploads
     *
     * @param UploadedFile $file
     * @return object
     */
    public function setImageFile(UploadedFile $file = null) {
        // set the value of the holder
        $this->imageFile       =   $file;
        // check if we have an old image path
        if (isset($this->imagePath)) {
            // store the old name to delete after the update
            $this->tempImagePath = $this->imagePath;
            $this->imagePath = null;
        } else {
            $this->imagePath = 'initial';
        }

        return $this;
    }

    /**
     * Get the file used for image uploads
     *
     * @return UploadedFile
     */
    public function getImageFile() {

        return $this->imageFile;
    }

    /**
     * Set imagePath
     *
     * @param string $imagePath
     * @return News
     */
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    /**
     * Get imagePath
     *
     * @return string
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * Get the absolute path of the imagePath
     */
    public function getImageAbsolutePath() {
        return null === $this->imagePath
            ? null
            : $this->getUploadRootDir().'/'.$this->imagePath;
    }

    /**
     * Get root directory for file uploads
     *
     * @return string
     */
    protected function getUploadRootDir($type='image') {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../web/'.$this->getUploadDir($type);
    }

    /**
     * Specifies where in the /web directory image uploads are stored
     *
     * @return string
     */
    protected function getUploadDir($type='image') {
        // the type param is to change these methods at a later date for more file uploads
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/news/images';
    }

    /**
     * Get the web path for the user
     *
     * @return string
     */
    public function getWebImagePath() {

        return '/'.$this->getUploadDir().'/'.$this->getImagePath();
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUploadImage() {
        if (null !== $this->getImageFile()) {
            // a file was uploaded
            // generate a unique filename
            $filename = $this->generateRandomImageFilename();
            $this->setImagePath($filename.'.'.$this->getImageFile()->guessExtension());
        }
    }

    /**
     * Generates a 32 char long random filename
     *
     * @return string
     */
    public function generateRandomImageFilename() {
        $count =0;
        do {
            $randomString = md5(uniqid());
            $count++;
        }

        while(file_exists($this->getUploadRootDir().'/'.$randomString.'.'.$this->getImageFile()->guessExtension()) && $count < 50);

        return $randomString;
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     *
     * Upload the profile picture
     *
     * @return mixed
     */
    public function uploadImage() {
        // check there is a profile pic to upload
        if ($this->getImageFile() === null) {
            return;
        }
        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getImageFile()->move($this->getUploadRootDir(), $this->getImagePath());

        // check if we have an old image
        if (isset($this->tempImagePath) && file_exists($this->getUploadRootDir().'/'.$this->tempImagePath)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->tempImagePath);
            // clear the temp image path
            $this->tempImagePath = null;
        }
        $this->imageFile = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeImageFile()
    {
        if ($file = $this->getImageAbsolutePath() && file_exists($this->getImageAbsolutePath())) {
            unlink($file);
        }
    }
}
