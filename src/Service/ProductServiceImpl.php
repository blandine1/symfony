<?php

namespace App\Service;

use App\DTO\Response;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductServiceImpl implements produitService
{

    private  $repository;
    public function __construct(ProduitRepository $repository)
    {
        return  $this->repository=$repository;
    }

    public function findAll(): JsonResponse
    {
        return $this->repository->findAll();
    }

    public function saveProduit(Produit $credit): Produit
    {
             return $this->repository->save($credit);
    }

    public function findById(Integer $id) : Produit
    {
       return $this->repository->find($id);
    }

    public function updateProduit(Integer $id)
    {
        // TODO: Implement updateCredit() method.
    }

    public function deleteProduit(Integer $id): void
    {
        $id = $this->repository->find($id);
        if($id==0 || $id==null){
            throw  new \Exception("no product is found with the given id : " + $id);
        }
        $this->repository->remove($id);
    }
}