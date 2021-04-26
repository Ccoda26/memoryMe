<?php


namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class UserController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ("/addUser", name="new_user_page")
     */
public function newUser(Request $request){
    $user = new User();
    $form = $this->createForm(UserType::class, $user);
    $form->handleRequest($request);

    return $this->render('user/newUser.html.twig',[
        'form' => $form->createView()
    ]);
}
}