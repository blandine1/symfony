<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Service\ProductServiceImpl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TestcController extends AbstractController
{
    #[Route('/testc', name: 'app_testc')]
    public function index(): JsonResponse
    {
        dd("test test test");
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/TestcController.php',
        ]);
    }

    private $service;

    public function __construct(ProductServiceImpl $productServiceImpl){
        return $this->service=$productServiceImpl;
    }

    #[Route('/produits', name:'listproduct', methods:'GET')]
    public function allProduit(): JsonResponse
    {
        dd("test d'appel");
        return $this->json([$this->service->findAll()]) ;
    }

    #[Route('/produit', name:'create_product', methods:'POST')]
    public function createProduit(Produit $produit): Response
    {
        return $this->service->saveProduit($produit);
    }

    #[Route('/produit/{id}', name:'show', methods:'GET')]
    public function findOne(Integer $produitId): JsonResponse
    {
        echo("test de saissie  clavier");
        $produit = $this->service->findById($produitId);

        if(!$produit){
            throw new Exception('no product found');
        }

        return  $this->json([$produit]);
    }
    #[Route('/produit/{id}', name: 'show', methods: 'DELETE')]
    public function deleteProduit():void
    {
        $this->service->deleteCredit();
    }
}
