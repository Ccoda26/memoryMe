<?php


namespace App\Controller;


use App\Repository\CardsRepository;
use App\Repository\TitleCardsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    /**
     * @Route("/Listscards", name="Listmycards_page")
     */
    public function AllCards(TitleCardsRepository $titleCardsRepository){

        $user =  $this->getUser()->getId();
        $titles = $titleCardsRepository->findAll(['userList' => $user]);



        return $this->render('user/AllCards.html.twig',[
            'titles'=> $titles
        ]);
    }


    /**
     * @Route("/cards/{id}", name="mydetail_page")
     */
    public function Cards(CardsRepository $cardsRepository, $id){
        $myCard = $cardsRepository->find($id);

        return $this->render('user/MyCards.html.twig',[
            'mycard'=> $myCard
        ]);
    }

    /**
     * @Route("/cards/make", name="NewTitle_page")
     */
    public function MakeCards(){

        //$user = new User();
       // $form = $this->createForm(UserType::class, $user);
        //$form->handleRequest($request);

        return $this->render('user/MakeCard.html.twig');
    }


    /**
     * @Route("/cards/makeown", name="newCards_page")
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