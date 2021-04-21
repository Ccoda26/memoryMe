<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/myAccount", name="account_page")
     */
    public function AllCards(){
        return $this->render('user/MyAccount.html.twig');
    }
}