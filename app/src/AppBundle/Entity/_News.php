<?php
/**
 * News entity.
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class News.
 *
 * @ORM\Table(
 *     name="news"
 * )
 * @ORM\Entity(
 *     repositoryClass="AppBundle\Repository\NewsRepository"
 * )
 */
class News
{
    const NUM_ITEMS = 10;

    /**
     * Primary key.
     *
     * @var int $id
     *
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
     * Title.
     *
     * @var string $title
     *
     * @ORM\Column(
     *     name="title",
     *     type="string",
     *     length=128,
     *     nullable=false,
     * )
     */
    protected $name;

    /**
     * Date of creation.
     *
     * @var string $created_date
     *
     * @ORM\Column(
     *     name="created_date",
     *     type="date",
     *     nullable=false,
     * )
     */
    protected $created_date;

    /**
     * Date of modification.
     *
     * @var string $modified_date
     *
     * @ORM\Column(
     *     name="modified_date",
     *     type="date",
     *     nullable=true,
     * )
     */
    protected $modified_date;

    /**
     * Author.
     *
     * @var string $created_author
     *
     * @ORM\Column(
     *     name="created_author",
     *     type="string",
     *     nullable=false,
     *     options={}
     * )
     */
    protected $created_author;

}
