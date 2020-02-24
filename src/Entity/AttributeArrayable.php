<?php

namespace App\Entity;

trait AttributeArrayable
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}