<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OthersCardsController extends AbstractController
{
    /**
     * @Route("/others/cards", name="others_cards_page")
     */
    public function AllOthersCards(){
        return $this->render('user/AllOthersCards.html.twig');
    }
}