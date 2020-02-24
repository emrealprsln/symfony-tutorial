<?php

namespace App\Controller;

use App\Entity\Product;
use App\Services\CommentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @var CommentService
     */
    private $commentService;

    /**
     * CommentController constructor.
     *
     * @param CommentService $commentService
     */
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * @Route("/products/{id}/comments", name="comment.store", methods={"POST"})
     * @param Product $product
     */
    public function store(Product $product)
    {
        $comment = $this->commentService->create($product, ['content' => 'Tutorial 1']);
    }
}
