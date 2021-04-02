<?php

namespace App\Controller\Web\User;

use App\Entity\User;
use App\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class MessagesController extends AbstractController
{
    /**
     * @Route("/user_success", name="user_success")
     * @param $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function register()
    {
        
        return $this->render('messages/user-success.html.twig');
    }
}
