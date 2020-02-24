<?php

namespace App\Controller;

use App\Services\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @var ProductService
     */
    private $productService;

    /**
     * ProductController constructor.
     *
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @Route("/products/{id}", methods={"GET"})
     * @param int $id
     */
    public function show(int $id)
    {
        $product = $this->productService->findOneById($id);

    }

    /**
     * @Route("/products", name="product.create", methods={"POST"})
     * @return Response
     */
    public function store()
    {
        $product = $this->productService->create([
            'name' => 'Product 1',
            'description' => 'Product description',
        ]);

        return new Response($product);
    }
}
