<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/asd",name="test",methods={"GET"})
     */
    public function index()
    {
        dd("asdösaöd");
    }
}