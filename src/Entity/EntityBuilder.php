<?php

namespace App\Entity;

class EntityBuilder
{
    /**
     * @var AbstractEntity
     */
    private $entity;

    /**
     * EntityBuilder constructor.
     *
     * @param $entity
     */
    public function __construct($entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return object|null
     * @param $id
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function find($id)
    {
        return $this->entity->getEntityManager()->find(get_class($this->entity), $id);
    }

    /**
     * @return void
     */
    public function save()
    {
        $this->entity->getEntityManager()->persist($this->entity);
        $this->entity->getEntityManager()->flush();
    }
}