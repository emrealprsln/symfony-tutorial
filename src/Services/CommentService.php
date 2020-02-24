<?php

namespace App\Services;

use App\Entity\Comment;
use App\Entity\Product;

class CommentService
{
    /**
     * @return Comment
     * @param array $params
     * @param Product $product
     */
    public function create(Product $product, array $params): Comment
    {
        $comment = new Comment($params);

        $product->addComment($comment);
        $product->save();

        return $comment;
    }
}