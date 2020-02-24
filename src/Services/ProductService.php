<?php

namespace App\Services;

use App\Entity\Product;

class ProductService
{
    public function findOneById(int $id): Product
    {
    }

    /**
     * @param array $params
     * @return Product
     */
    public function create(array $params): Product
    {
        $product = new Product($params);
        $product->save();

        return $product;
    }
}