<?php
/**
 * Created by PhpStorm.
 * User: hicha
 * Date: 18/10/2019
 * Time: 11:05.
 */

namespace App\Service;

use App\Entity\Image;
use App\Entity\User;
use App\Entity\Cadre;
use App\Entity\Situation;
use App\Repository\CadreRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Serializer\Normalizer\DataUriNormalizer;

final class UserService
{
    private $userRepo;
    private $entityManager;
    private $fileUploadService;
    private $cadreRepo;

    public function __construct(UserRepository $user, EntityManagerInterface $em, FileUploadService $fuploadService, CadreRepository $crepo)
    {
        $this->userRepo = $user;
        $this->entityManager = $em;
        $this->fileUploadService = $fuploadService;
        $this->cadreRepo = $crepo;
    }

    public function find($id)
    {
        return $this->userRepo->findById($id);
    }

    /**
     * @return \App\Entity\User[]
     */
    public function fetchUsers()
    {
        return $this->userRepo
            ->findAll();
    }

    /**
     * @return \App\Entity\User[]
     */
    public function fetchUserBySOM($som)
    {
        return $this->userRepo
            ->findOneBy(array('som' => $som));
    }

    /**
     * @param $photo
     * @param $cin
     * @param $som
     * @param $pbudget
     * @param $bdate
     * @param $bplace
     * @param $bplace_ar
     * @param $address
     * @param $address_ar
     * @param $fstatus
     * @param $nbchildren
     * @param $phone
     * @param $lname
     * @param $fname1
     * @param $fname2
     * @param $lname_ar
     * @param $fname_ar1
     * @param $lname_ar2
     * @param $starting_date
     * @param $cadre
     * @param mixed $fname_ar2
     *
     * @return Personne
     */
    public function addPersonnel(
        $photo = null,
        $cin = null,
        $som = null,
        $pbudget = null,
        $bdate = null,
        $bplace = null,
        $address = null,
        $address_ar = null,
        $fstatus = null,
        $nbchildren = null,
        $phone = null,
        $lname = null,
        $lname_ar = null,
        $fname_ar1 = null,
        $fname_ar2 = null,
        $fname1 = null,
        $fname2 = null,
        $starting_date = null,
        $bplace_ar = null,
        $cadre = null
    ): Personne {

        $Cadre = new Cadre();
        $Situation = new Situation();
        $targetCadre = $this->cadreRepo->find($cadre);
        $Cadre->setTitle($targetCadre->getTitle());
        $Cadre->setEchelle($targetCadre->getEchelle());
        $Cadre->setDescription($targetCadre->getDescription());
        $Situation->setCadre($Cadre);
        $Situation->setEchelon(0000);
        $Situation->setDateEffet(new \DateTime());
        $Situation->setNumeroIndocatif(0000);
        $Situation->setRemarks("no echelon, no date effet  and no numero Indocatife yet");

        $image = new Image();
        $filename = $this->fileUploadService->upload($photo);
        $image->setPath(
            'documents/images/'.$filename
        );

        $image->setFilename($filename);
        $personne = new Personne();
        $personne->addSituation($Situation);
        $personne->setPhoto($image);
        $personne->setCin($cin);
        $personne->setSom($som);
        $personne->setPosteBudgetaire($pbudget);
        $personne->setDateNaissance(new \DateTime($bdate));
        $personne->setLieuNaissance($bplace);
        $personne->setAdresse($address);
        $personne->setAdresseAr($address_ar);
        $personne->setSituationDeFamille($fstatus);
        $personne->setNbEnfants($nbchildren);
        $personne->setTelephone($phone);
        $personne->setNom($lname);
        $personne->setNomAr($lname_ar);
        $personne->setPrenomAr1($fname_ar1);
        $personne->setPrenomAr2($fname_ar2);
        $personne->setPrenom1($fname1);
        $personne->setPrenom2($fname2);
        $personne->setDateRecrutement($starting_date);
        $personne->setLieuNaissanceAr($bplace_ar);
        $image->setPersonne($personne);
        $this->entityManager->persist($personne);
        $this->entityManager->flush();

        return $personne;
    }
}
