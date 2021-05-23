<?php


namespace App\Controller;


use App\Entity\Cards;
use App\Entity\Category;
use App\Entity\TitleCards;
use App\Form\CardAnswerType;
use App\Form\CardType;
use App\Form\TitleCardsType;
use App\Repository\CardsRepository;
use App\Repository\CategoryRepository;
use App\Repository\TitleCardsRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     *
     * @param CardsRepository $cardsRepository
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function Cards(CardsRepository $cardsRepository, $id, Request $request){
        $myCard = $cardsRepository->findBy(['titleOfCards' => $id]);

        /*
         * chercher comment faire un submit manuel eviter creer table expres inutile
         *
         * recuperer valeur select pour durer du prochain rappel 
         */

        return $this->render('user/MyCards.html.twig',[
            'mycard'=> $myCard,

        ]);
    }

    /**
     * @Route("/nouvellelistdecarte", name="NewTitle_page")
     */
    public function MakeCards(Request $request, EntityManagerInterface $entityManager, CategoryRepository $categoryRepository){
        $allcategorie =$categoryRepository->findAll();
        $titleCards = new TitleCards();
       $form = $this->createForm(TitleCardsType::class, $titleCards);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $dataTitle = $form->get('title')->getData();
            $titleCards->setTitle($dataTitle);

            $user = $this->getUser();
            $titleCards->addUserList($user);
            $categ = new Category();
            $DataCategory = $request->request->get('categorie');
           $category = $categoryRepository->findOneBy(['name'=> $DataCategory]);

            $categ->addTitleCard($titleCards);
            $titleCards->setCategoryList($category);


            $entityManager->persist($titleCards);
            $entityManager->flush();

            return $this->redirectToRoute('newCards_page');
        }

        return $this->render('user/MakeCard.html.twig',[
            'form' => $form->createView(),
            'allcategories' => $allcategorie
        ]);
    }


    /**
     * @Route("/ajoutsdesquestions", name="newCards_page")
     */
    public function MakeOwnCards(Request $request, EntityManagerInterface $entityManager){
        $Cards = new Cards();
        $form = $this->createForm(CardType::class, $Cards);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $dataQuestion = $form->get('question')->getData();
            $dataAnswer = $form->get('answer')->getData();
            $dataDate = new \DateTime("Europe/Paris");
            $dataSecondate = new \DateTime("Europe/Paris +10 days");

            $Cards->setQuestion($dataQuestion);
            $Cards->setAnswer($dataAnswer);

            $Cards->setFirstDate($dataDate);
            $Cards->setRappelDate($dataSecondate);



            $entityManager->persist($Cards);
            $entityManager->flush();

            return $this->redirectToRoute('newCards_page');

        }

        return $this->render('user/MakeOwn.html.twig',[
            'form' => $form->createView()
        ]);
    }



    /**
     * @Route("/cardsadd", name="Addcards_page")
     */
    public function AddCards(){

        return $this->render('user/OtherCards.html.twig');
    }


}