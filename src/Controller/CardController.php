<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    /**
     * @Route("/Listscards", name="Listcards_page")
     */
    public function AllCards(){
        return $this->render('user/AllCards.html.twig');
    }


    /**
     * @Route("/cards", name="cards_page")
     */
    public function Cards(){
        return $this->render('user/MyCards.html.twig');
    }

    /**
     * @Route("/cards/make", name="Makecards_page")
     */
    public function MakeCards(){

        //$user = new User();
       // $form = $this->createForm(UserType::class, $user);
        //$form->handleRequest($request);

        return $this->render('user/MakeCard.html.twig');
    }


    /**
     * @Route("/cards/makeown", name="makeown_page")
     */
    public function MakeOwnCards(){
        return $this->render('user/MakeOwn.html.twig');
    }



    /**
     * @Route("/cards/add", name="Addcards_page")
     */
    public function AddCards(){
        return $this->render('user/OtherCards.html.twig');
    }


}