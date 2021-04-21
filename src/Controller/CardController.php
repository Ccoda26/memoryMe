<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    /**
     * @Route("/cards", name="cards_page")
     */
    public function AllCards(){
        return $this->render('user/MyCards.html.twig');
    }

    /**
     * @Route("/cards/add", name="Addcards_page")
     */
    public function AddCards(){
        return $this->render('user/AddCards.html.twig');
    }


}