<?php
/**
 * User entity.
 */
namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="fos_user"
 * )
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(
     *     name="id",
     *     type="integer",
     *     nullable=false,
     *     options={"unsigned"=true},
     * )
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

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
     * @ORM\Column(name="img", type="string", length=255, nullable=true)
     * @Assert\Length(
     *     min="3",
     *     max="255",
     * )
     */
    private $img;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     * @Assert\Length(
     *     min="3",
     *     max="255",
     * )
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     * @Assert\Length(
     *     min="2",
     *     max="255",
     * )
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="date", nullable=true)
     * @Assert\LessThan("today")
     */
    private $dateOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=45, nullable=true)
     * @Assert\Length(
     *     min="3",
     *     max="45",
     * )
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="emergency_phone", type="string", length=45, nullable=true)
     * @Assert\Length(
     *     min="3",
     *     max="45",
     * )
     */
    private $emergencyPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="health_issues", type="string", length=1000, nullable=true)
     * @Assert\Length(
     *     min="3",
     *     max="1000",
     * )
     */
    private $healthIssues;

    /**
     * @var string
     *
     * @ORM\Column(name="nourishment_issues", type="string", length=1000, nullable=true)
     * @Assert\Length(
     *     min="3",
     *     max="1000",
     * )
     */
    private $nourishmentIssues;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set img
     *
     * @param string $img
     *
     * @return User
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
     * Set description
     *
     * @param string $description
     *
     * @return User
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
     * Set name
     *
     * @param string $name
     *
     * @return User
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
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     *
     * @return User
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set emergencyPhone
     *
     * @param string $emergencyPhone
     *
     * @return User
     */
    public function setEmergencyPhone($emergencyPhone)
    {
        $this->emergencyPhone = $emergencyPhone;

        return $this;
    }

    /**
     * Get emergencyPhone
     *
     * @return string
     */
    public function getEmergencyPhone()
    {
        return $this->emergencyPhone;
    }

    /**
     * Set healthIssues
     *
     * @param string $healthIssues
     *
     * @return User
     */
    public function setHealthIssues($healthIssues)
    {
        $this->healthIssues = $healthIssues;

        return $this;
    }

    /**
     * Get healthIssues
     *
     * @return string
     */
    public function getHealthIssues()
    {
        return $this->healthIssues;
    }

    /**
     * Set nourishmentIssues
     *
     * @param string $nourishmentIssues
     *
     * @return User
     */
    public function setNourishmentIssues($nourishmentIssues)
    {
        $this->nourishmentIssues = $nourishmentIssues;

        return $this;
    }

    /**
     * Get nourishmentIssues
     *
     * @return string
     */
    public function getNourishmentIssues()
    {
        return $this->nourishmentIssues;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return User
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
}
