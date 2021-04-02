<?php

namespace App\Controller\Web\User;

use App\Entity\User;
use App\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{

    /**
     * @Route("/login", name="login")
     * @param AuthenticationUtils $authUtils
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request,AuthenticationUtils $authUtils)
    {
        $lastUsername = $authUtils->getLastUsername();
        $error = $authUtils->getLastAuthenticationError();

        return $this->render('security/login.html.twig', [
            'route_name' => 'login',
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }
     /**
         * @Route("/logout", name="logout")
         * @return \Symfony\Component\HttpFoundation\Response
             */
        public function logout()
        {
          
        }
}
