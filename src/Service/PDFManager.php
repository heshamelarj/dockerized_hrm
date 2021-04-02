<?php
/**
 * Created by PhpStorm.
 * User: heshamelarj
 * Date: 4/16/20
 * Time: 3:59 PM
 */

namespace App\Service;


class PDFManager
{

    private $templating;
    public function __construct(\Twig\Environment $templating)
    {

        $this->templating = $templating;
    }


    /**
     * @param $view
     * @param $user
     * @param $cadre
     * @param $situation
     * @param $attestationTravaill
     */

    public function generateWorkcertificate($view,$user,$cadre,$situation,$attestationTravaill)
    {
        
    }

    /**
     * @param $view
     * @param $user
     * @param $cadre
     * @param $autorisation
     */
    public function generateTravelautorisation($view,$user,$cadre,$autorisation){

    }

    /**
     * @param $view
     * @param $paper_orientation
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function renderPDF($view,$user,$cadre,$situation = null,$attestationTravaill = null ,$autorisation = null)
    {


//        $options = new Options();
//        $options ->setDefaultFont('Arial');
//        $options->setIsRemoteEnabled(true);
//        $options->set('debugKeepTemp', true);
//        $options->set('isHtml5ParserEnabled', true);
//        $dompdf = new Dompdf($options);
//        $html = null;
//        if($attestationTravaill)
//        $html = $this->templating->render($view,array('user' => $user, 'cadre' => $cadre, 'situation' => $situation, 'attestation_travaill' => $attestationTravaill));
//        elseif ($autorisation)
//            $html = $this->templating->render($view,array('user' => $user, 'cadre' => $cadre, 'autorisation' => $autorisation));
//        $dompdf->loadHtml($html);
//        $dompdf->setPaper('A4',$paper_orientation);
//        $dompdf->render();
//        $date = new \DateTime();
//        $dompdf->stream('attestation du '.$user->getSom().' date: '.$date->format('d-m-Y H:i:s'),[
//            'Attachment' => false
//        ]);
    }



}