<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{

    /**
     * @Route("/", name="homepage")
     */
    public function Homepage(){
//dd($this->getUser());
        if($this->getUser()){
            return $this->render('base.html.twig');
        }else{
          return $this->redirectToRoute('app_login');
        }
    }
}