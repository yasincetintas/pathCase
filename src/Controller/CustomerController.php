<?php


namespace App\Controller;


use App\Entity\Products;
use App\Exceptions\ValidationException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    /**
     * @Route("/api/test",name="test",methods={"GET"})
     */
    public function test()
    {
        $products = $this->getDoctrine()->getRepository(Products::class)->findAll();
        dd( $products);
    }
}