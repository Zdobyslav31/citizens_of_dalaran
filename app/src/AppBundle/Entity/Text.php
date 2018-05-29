<?php
/**
 * Text entity.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Static Text
 *
 * @ORM\Table(
 *     name="text",
 * )
 * @ORM\HasLifecycleCallbacks()
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
     *     maxSize="2048k",
     *     maxWidth="2500",
     *     maxHeight="2500"
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
        return 'uploads/texts/images';
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
