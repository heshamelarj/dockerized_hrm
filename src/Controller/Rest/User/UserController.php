<?php

namespace App\Controller\Rest\User;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class UserController extends FOSRestController
{

    private $userSevc;

    public function __construct(UserService $usr_srvc)
    {
        $this->userSevc = $usr_srvc;
    }
    /**
     * Fetch Users
     * @Rest\Get("/users")
     * @return View
     */
    public function fetchUsers()
    {
      
        $users = $this->userSevc->fetchUsers();
       
        // In case our GET was a success we need to return a 200 HTTP OK response with the collection of article object
        return View::create($users, Response::HTTP_OK);
    }

    /**
     * @Rest\Post("/user_by_som")
     * @param Request $request
     * @return View
     */
    public function fetchUserBySOM(Request $request)
    {
        $som = $request->get('som');
        $user = $this->userSevc->fetchUserBySOM($som);

        // In case our GET was a success we need to return a 200 HTTP OK response with the collection of article object
        return View::create($user, Response::HTTP_OK);
    }
}
