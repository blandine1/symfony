<?php

namespace App\Service;

use App\Entity\Produit;
use Symfony\Component\HttpFoundation\JsonResponse;

interface produitService
{
    public function saveProduit(Produit $credit);
    public function findById(Integer $id);
    public function updateProduit(Integer $id);
    public function deleteProduit(Integer $id);
    public function findAll() :JsonResponse;
}