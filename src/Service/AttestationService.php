<?php
/**
 * Created by PhpStorm.
 * User: hicha
 * Date: 06/01/2020
 * Time: 16:02
 */

namespace App\Service;


use App\Entity\Attestation;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class AttestationService
{
    private $entityManager;



    public function __construct( EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;


    }

    /**
     * @param $user User
     * @return Attestation|null
     */
    public function persistAttestation($user) : ? Attestation
    {
      $attestation = new Attestation();
      $attestation->setDate(new \DateTime());
      $attestation->setUser($user);
      $attestation->createdAt();
      $attestation->updatedAt();
      $user->addAttestation($attestation);
      $this->entityManager->persist($user);
      $this->entityManager->persist($attestation);
       $this->entityManager->flush();

      return $attestation;

    }

}
