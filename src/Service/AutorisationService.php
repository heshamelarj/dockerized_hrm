<?php
/**
 * Created by PhpStorm.
 * User: heshamelarj
 * Date: 1/13/20
 * Time: 8:08 PM
 */

namespace App\Service;

use App\Entity\Autorisation;
use App\Repository\AutorisationRepository;
use Doctrine\ORM\EntityManagerInterface;

class AutorisationService
{
    private $entityManager;
    private $personnelService;
    private $dtServc;
    private $autorisationRepo;


    public function __construct( EntityManagerInterface $entityManager, PersonnelService $pservice, DocumentTypeService $dtServic,AutorisationRepository $autrepo)
    {
        $this->entityManager = $entityManager;
        $this->personnelService = $pservice;
        $this->dtServc = $dtServic;
        $this->autorisationRepo = $autrepo;

    }

    /**
     * @param $typeId
     * @param $personneId
     * @param $startDate
     * @param $endDate
     * @param $traitementState
     * @param $granted
     * @return Autorisation|null
     */
    public function persistAutorisation($type,$personneId,$startDate, $endDate,$motif,$detail,$processingState,$granted) : ?Autorisation
    {
        $autorisation = new Autorisation();
        $personne = $this->personnelService->find($personneId);
        

        $autorisation
            ->setPersonne($personne)
            ->setType($type)
            ->setDateDebut(new \DateTime($startDate))
            ->setDateFin(new \DateTime($endDate))
            ->setMotif($motif)
            ->setDetail($detail)
            ->setEtatTraitement($processingState)
            ->setGranted($granted);
        $this->entityManager->persist($autorisation);
        $this->entityManager->flush();
        return $autorisation;

    }

    /**
     * @param $type autorisation type [String]
     * @return Autorisation|null
     */
    public function fetchLastAutorisation($type) : ? Autorisation
    {
        return $this->autorisationRepo->findLastOneByType($type);
    }
    public function fetchLastThreeAutorisations($type) : array
    {
        return $this->autorisationRepo->findLastThreeByType($type);
    }
}