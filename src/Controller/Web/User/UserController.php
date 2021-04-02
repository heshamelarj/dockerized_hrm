<?php

namespace App\Controller\Web\User;

use App\Entity\Autorisation;
use App\Entity\Situation;
use App\Entity\User;
use App\Form\Type\AutorisationType;
use App\Service\AttestationService;
use App\Service\PDFManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\UserService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Dompdf\Dompdf;
use Dompdf\Options ;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
class UserController extends AbstractController
{
    private $userSevc;
    private $pdf_manager;
    private $attestation_service;
    private $entity_manager;
    public function __construct(UserService $usr_srvc, PDFManager $pdf, AttestationService $attestationService,EntityManagerInterface $em)
    {
        $this->userSevc = $usr_srvc;
        $this->pdf_manager = $pdf;
        $this->attestation_service = $attestationService;
        $this->entity_manager = $em;
    }

    /**
     * @Route("/", name="user")
     */
    public function index()
    {
        return $this->render('user/index.html.twig');
    }

    /**
     * @Route("/list-users", name="list-users")
     */
    public function showUsers(Request $request,\Knp\Snappy\Pdf $snappy)
    {
        $autorisation =    new Autorisation();


        $modalForm = $this->createForm(AutorisationType::class,$autorisation,
            [
                'action' => $this->generateUrl('list-users'),
            ]);
        $modalForm->handleRequest($request);
        if($modalForm->isSubmitted() && $modalForm->isValid())
        {

            $user = $modalForm->getData()->getUser();
            $cadre = $user->getCadre();
            $autorisation = $modalForm->getData();


            if($autorisation->getType() == "Autorisation Quitter Le Territoire")
            {

                $this->pdf_manager->renderPDF('pdf/travelautorisation.pdf.html.twig','portrait',$user,$cadre,null,null,$autorisation);
            }
            else if($autorisation->getType() == "Autorisations d'absence")
            {
                $cadre = $user->getSituations()[0]->getCadre();
                $this->entity_manager->persist($autorisation);
                $this->entity_manager->flush();
                $this->addFlash('success',"autorisation  d'absence a ete bien enregistré !");
                $view =   $this->renderView('pdf/autorisationabsence.pdf.html.twig',
                    array(
                        'user' => $user,
                        'cadre' => $cadre,
                        'autorisation' =>$autorisation

                    )

                );

                $docName =$autorisation->getId().'-'.$user->getSom().'.pdf';
                $docPath = 'documents/autorisations/absence/aut_abs_num_';
                $snappy->generateFromHtml(
                    $view,
                    $docPath.$docName,
                    array(
                        'orientation' => 'landscape',
                        'enable-javascript' => true,
                        'javascript-delay' => 1000,
                        'no-stop-slow-scripts' => true,
                        'no-background' => false,
                        'lowquality' => false,
                        'encoding' => 'utf-8',
                        'images' => true,
                        'cookie' => array(),
                        'dpi' => 300,
                        'image-dpi' => 300,
                        'enable-external-links' => true,
                        'enable-internal-links' => true
                    )
                );
                return new Response(
                    $snappy->getOutPutFromHtml(
                        $view,
                        array(
                            'orientation' => 'landscape',
                            'margin-bottom' => '15',
                            'margin-top' => '3',
                            'margin-left' => '30',
                            'margin-right' => '30',
                            'enable-javascript' => true,
                            'javascript-delay' => 1000,
                            'no-stop-slow-scripts' => true,
                            'no-background' => false,
                            'lowquality' => false,
                            'encoding' => 'utf-8',
                            'images' => true,
                            'cookie' => array(),
                            'dpi' => 300,
                            'image-dpi' => 300,
                            'enable-external-links' => true,
                            'enable-internal-links' => true
                        )

                    ),200, array(
                    'Content-Type'          => 'application/pdf'
                ));
            }


        }
        $users = $this->userSevc->fetchUsers();
        return $this->render('user/userslist.html.twig',array('users' => $users,'form' => $modalForm->createView()));
    }
    //TODO:Fetch the saved Autorisation
    /**
     * @Route("/user/autorisation/{user_id}", name="validate-autorisation")
     * @ParamConverter("autorisation", options={"mapping": { "user_id": "user"}})
     */
    public function ValidatAutorisations(Autorisation $autorisation)
    {




        $modalForm = $this->createForm(AutorisationType::class,$autorisation,
            [
                'action' => $this->generateUrl('validate-autorisation'),
            ]);

        return $this->render('user/userslist.html.twig',array('users' => $users,'form' => $modalForm->createView()));
    }


    /**
     * @Route("/user/attestation/{som}", name="generate-pdf")
     * @ParamConverter("user", options={"mapping": { "som": "som"}})
     */
    public function generateWorkCertificate(User $user,\Knp\Snappy\Pdf $snappy)
    {

        $attTravaill = $this->attestation_service->persistAttestation($user);
        $cadre = $user->getSituations()[0]->getCadre();
        $situation = $user->getSituations()[0];
        $view =   $this->renderView('pdf/workcertificate.pdf.html.twig',
            array(
                'user' => $user,
                'cadre' => $cadre,
                'situation' => $situation,
                'attestation_travaill' => $attTravaill
            )

        );

        $docName =$attTravaill->getId().'-'.$user->getSom().'.pdf';
        $docPath = 'documents/attestations_travail/attestation_Num_';
        $snappy->generateFromHtml(
            $view,
            $docPath.$docName,
            array(
                'orientation' => 'landscape',
                'enable-javascript' => true,
                'javascript-delay' => 1000,
                'no-stop-slow-scripts' => true,
                'no-background' => false,
                'lowquality' => false,
                'encoding' => 'utf-8',
                'images' => true,
                'cookie' => array(),
                'dpi' => 300,
                'image-dpi' => 300,
                'enable-external-links' => true,
                'enable-internal-links' => true
            )
        );
        return new Response(
            $snappy->getOutPutFromHtml(
            $view,
            array(
                'orientation' => 'landscape',
                'margin-bottom' => '15',
                'margin-top' => '3',
                'margin-left' => '30',
                'margin-right' => '30',
                'enable-javascript' => true,
                'javascript-delay' => 1000,
                'no-stop-slow-scripts' => true,
                'no-background' => false,
                'lowquality' => false,
                'encoding' => 'utf-8',
                'images' => true,
                'cookie' => array(),
                'dpi' => 300,
                'image-dpi' => 300,
                'enable-external-links' => true,
                'enable-internal-links' => true
            )

        ),200, array(
            'Content-Type'          => 'application/pdf'
        ));

    }

    /**
     * @Route("/user/autorisation/{som}", name="ask-for-aqtn")
     * @ParamConverter("user", options={"mapping": { "som": "som"}})
     */
    public function askForAQTN(User $user)
    {



    }



}

