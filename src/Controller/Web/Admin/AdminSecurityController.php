<?php
/**
 * Created by PhpStorm.
 * User: heshamelarj
 * Date: 3/4/20
 * Time: 8:43 PM
 */

namespace App\Controller\Web\Admin;

use App\Entity\User;
use App\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class AdminSecurityController extends AbstractController
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    /**
     * @Route("/register-user", name="admin-register-user")
     * @param $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request)
    {
        //TODO: form validation
        $user = new User();

        $form = $this->createForm(UserType::class,$user,[
            'action' => $this->generateUrl('admin-register-user'),
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated

            $user = $form->getData();
            $password = $this->passwordEncoder->encodePassword($user,$user->getPassword());

            $user->setPassword($password);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('success','User has been created succefully');

            return $this->redirectToRoute('user');
        }
        return $this->render('security/register.html.twig', [
            'route_name' => 'register',
            'form' => $form->createView(),
        ]);
    }


}
