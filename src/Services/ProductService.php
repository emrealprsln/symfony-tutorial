<?php

namespace App\Services;

use App\Entity\Product;

class ProductService
{
    /**
     * @return Product
     * @param int $id
     * @throws \Exception
     */
    public function findOneById(int $id): Product
    {
        if ($product = Product::find($id)) {
            return $product;
        }

        throw new \Exception('Product not found.');
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