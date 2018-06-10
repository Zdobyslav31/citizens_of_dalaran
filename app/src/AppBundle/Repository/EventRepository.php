<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use AppBundle\Entity\Event;
use UserBundle\Entity\User;


/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventRepository extends EntityRepository
{
    /**
     * Gets all records paginated.
     *
     * @param int $page Page number
     *
     * @return \Pagerfanta\Pagerfanta Result
     */
    public function findPaginated($page = 1, $criteria = null)
    {
        if ('past' == $criteria) {
            $collection = $this->findAllPast();
        } elseif ('future' == $criteria) {
            $collection = $this->findAllFuture();
        } else {
            $collection = $this->queryAll();
        }
        $paginator = new Pagerfanta(new DoctrineORMAdapter($collection, false));
        $paginator->setMaxPerPage(Event::NUM_ITEMS);
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
        return $this->createQueryBuilder('event')->orderBy('event.dateStart', 'ASC');
    }

    /**
     * Query all future events
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findAllFuture() {
        return $this->createQueryBuilder('event')
            ->orderBy('event.dateStart', 'ASC')
            ->where('event.dateEnd > :now')
            ->setParameter('now', new \DateTime('now'));
    }

    /**
     * Query all past events
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findAllPast() {
        return $this->createQueryBuilder('event')
            ->orderBy('event.dateStart', 'DESC')
            ->where('event.dateEnd < :now')
            ->setParameter('now', new \DateTime('now'));
    }

    /**
     * Find all posts created or modified by user
     * @param integer $max
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findUpcoming($max)
    {
        $query = $this->createQueryBuilder('event')
            ->select('event.id, event.dateStart, event.name, event.summary')
            ->orderBy('event.dateStart', 'ASC')
            ->where('event.dateStart > :now')
            ->setMaxResults($max)
            ->setParameter('now', new \DateTime('now'))
            ->getQuery();

        return $query->execute();
    }

    public function findDisplayedMain($max)
    {
        $query = $this->createQueryBuilder('event')
            ->select('event.id, event.imagePath, event.name, event.summary')
            ->orderBy('event.dateStart', 'ASC')
            ->Where('event.displayedMain = true')
            ->setMaxResults($max)
            ->getQuery();

        return $query->execute();
    }

    /**
     * Save entity.
     *
     * @param \AppBundle\Entity\Event $event Event entity
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Event $event)
    {
        $this->_em->persist($event);
        $this->_em->flush($event);
    }

    /**
     * Delete entity.
     *
     * @param \AppBundle\Entity\Event $event Event entity
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Event $event)
    {
        $this->_em->remove($event);
        $this->_em->flush();
    }
}
