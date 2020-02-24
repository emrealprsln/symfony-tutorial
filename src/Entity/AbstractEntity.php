<?php

namespace App\Entity;

use Doctrine\ORM\EntityManager;

/**
 * Class AbstractEntity.
 *
 * @method static find(int $id)
 * @method save()
 */
abstract class AbstractEntity
{
    use AttributeFillable, AttributeArrayable;

    /**
     * @var EntityManager
     */
    private $_em;

    /**
     * AbstractEntity constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->fillAttributes($attributes);
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager(): EntityManager
    {
        if (is_null($this->_em)) {
            $this->_em = entity_manager();
        }

        return $this->_em;
    }

    /**
     * Handle method calls on the builder.
     *
     * @return mixed
     * @param array $parameters
     * @param string $method
     * @throws \Exception
     */
    public function __call($method, $parameters)
    {
        try {
            $builder = new EntityBuilder($this);

            return $builder->{$method}(...$parameters);
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

    /**
     * Handle static method calls.
     *
     * @return mixed
     * @param array $parameters
     * @param string $method
     */
    public static function __callStatic($method, $parameters)
    {
        return (new static)->$method(...$parameters);
    }
}