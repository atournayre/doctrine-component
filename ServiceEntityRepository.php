<?php

namespace Atournayre\Common\Doctrine;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository as ServiceEntityRepositoryDoctrine;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

class ServiceEntityRepository extends ServiceEntityRepositoryDoctrine
{
    /**
     * @param ?string $entityClass Le nom de la classe de l'entité gérée par ce repository.
     */
    public function __construct(ManagerRegistry $registry, ?string $entityClass = null)
    {
        if (is_null($entityClass)) {
            throw new \LogicException('EntityClass doit être fourni pour ce repository.');
        }
        parent::__construct($registry, $entityClass);
    }

    /**
     * @param array|object|null $entities
     * @throws ORMException
     */
    protected function persist($entities): void
    {
        if (is_null($entities)) {
            return;
        }

        if (is_object($entities)) {
            $this->getEntityManager()->persist($entities);
            return;
        }

        $entities = array_filter($entities);
        foreach ($entities as $entity) {
            $this->getEntityManager()->persist($entity);
        }
    }

    /**
     * @param array|object|null $entities
     * @throws ORMException
     */
    protected function remove($entities): void
    {
        if (is_null($entities)) {
            return;
        }

        if (is_object($entities)) {
            $this->getEntityManager()->remove($entities);
            return;
        }

        $entities = array_filter($entities);
        foreach ($entities as $entity) {
            $this->getEntityManager()->remove($entity);
        }
    }

    /**
     * @param null|object|array $entity
     *
     * @return void
     *
     * @throws OptimisticLockException If a version check on an entity that
     *         makes use of optimistic locking fails.
     * @throws ORMException
     */
    protected function flush($entity = null): void
    {
        $this->getEntityManager()->flush($entity);;
    }
}
