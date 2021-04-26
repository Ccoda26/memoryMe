<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{

    /**
     * @Route("/Acceuil", name="homepage")
     */
    public function Homepage(){

      return $this->render('base.html.twig');
    }
}