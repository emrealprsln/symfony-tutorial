<?php

namespace App\Entity;

use Doctrine\ORM\EntityManager;

abstract class EntityProcessing
{
    use AttributeFillable, AttributeArrayable;

    /**
     * @var EntityManager
     */
    private $_em;

    /**
     * EntityProcessing constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->_em = entity_manager();
        $this->fillAttributes($attributes);
    }

    /**
     * @return void
     */
    public function save()
    {
        $this->_em->persist($this);
        $this->_em->flush();
    }
}