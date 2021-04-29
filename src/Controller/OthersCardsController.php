<?php


namespace App\Controller;


use App\Repository\CardsRepository;
use App\Repository\TitleCardsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OthersCardsController extends AbstractController
{
    /**
     * @Route("/others/cards", name="others_cards_page")
     */
    public function AllOthersCards(TitleCardsRepository $titleCardsRepository){
        $Alltitle = $titleCardsRepository->findAll();

        return $this->render('others/AllOthersCards.html.twig',[
           'Alltitles' => $Alltitle
        ]);
    }


    /**
     * @Route("/others/cards/questions/{id}", name="othersQ_page")
     * @param CardsRepository $cardsRepository
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ListQuestions(CardsRepository $cardsRepository,$id){
        $Allquestions = $cardsRepository->find($id);

        return $this->render('others/listQuest.html.twig',[
            'Allquestion' => $Allquestions
        ]);
    }
}