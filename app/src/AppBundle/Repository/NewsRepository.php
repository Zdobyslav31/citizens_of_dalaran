<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use AppBundle\Entity\News;
use UserBundle\Entity\User;


/**
 * NewsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NewsRepository extends EntityRepository
{
    /**
     * Gets all records paginated.
     *
     * @param int $page Page number
     *
     * @return \Pagerfanta\Pagerfanta Result
     */
    public function findAllPaginated($page = 1)
    {
        $paginator = new Pagerfanta(new DoctrineORMAdapter($this->queryAll(), false));
        $paginator->setMaxPerPage(News::NUM_ITEMS);
        $paginator->setCurrentPage($page);

        return $paginator;
    }

    /**
     * Query all entities.
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    protected function queryAll()
    {
        return $this->createQueryBuilder('news')->orderBy('news.createdDate', 'DESC');
    }

    /**
     * Find all posts created or modified by user
     * @param User $user
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findAllByUser($user)
    {
        $query = $this->createQueryBuilder('news')
            ->orderBy('news.createdDate', 'DESC')
            ->where('news.creator = :user')
            ->orWhere('news.modifier = :user')
            ->setParameter('user', $user)
            ->getQuery();

        return $query->execute();
    }

    /**
     * Save entity.
     *
     * @param \AppBundle\Entity\News $news News entity
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(News $news)
    {
        $this->_em->persist($news);
        $this->_em->flush($news);
    }

    /**
     * Delete entity.
     *
     * @param \AppBundle\Entity\News $news News entity
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(News $news)
    {
        $this->_em->remove($news);
        $this->_em->flush();
    }
}
