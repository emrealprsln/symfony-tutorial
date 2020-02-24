<?php

namespace App\Entity;

use Doctrine\Common\Inflector\Inflector;

trait AttributeFillable
{
    /**
     * @param string $attribute
     * @return string
     */
    private function fetchSetterMethod(string $attribute): string
    {
        return Inflector::camelize("set_{$attribute}");
    }

    /**
     * @param array $attributes
     * @return $this
     */
    protected function fillAttributes(array $attributes): self
    {
        foreach ($attributes as $key => $value) {
            if (method_exists($this, $method = $this->fetchSetterMethod($key))) {
                $this->$method($value);
            }
        }

        return $this;
    }
}