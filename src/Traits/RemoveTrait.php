<?php

namespace Atournayre\Component\Doctrine\Traits;

use Atournayre\Component\Doctrine\Contracts\IsEntityInterface;
use Webmozart\Assert\Assert;
use Doctrine\Common\Collections\Collection;

trait RemoveTrait
{
    public function remove(object $entity, bool $flush = false): void
    {
        Assert::isInstanceOf($entity, IsEntityInterface::class, 'The object passed in parameter is not an entity.');

        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function removeMany(array|Collection $entities, bool $flush = false): void
    {
        if ($entities instanceof Collection) {
            $entities = $entities->toArray();
        }

        $validEntities = array_filter($entities, fn($entity) => !is_null($entity));

        Assert::allIsInstanceOf($validEntities, IsEntityInterface::class, 'The object passed in parameter is not an entity.');

        foreach ($validEntities as $entity) {
            $this->getEntityManager()->remove($entity);
        }

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
