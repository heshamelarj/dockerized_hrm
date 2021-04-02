<?php
namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class CSVManager
{
    private $entityManager;

    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
    }

    public function saveRecord($record)
    {
       
        if($record[3] != null)
        {

      
        $dateRecru =  explode('/',$record[7]);

      
        $dateNaissance =  explode('/',$record[3]);
        $reversedDateNaissance = count($dateNaissance) > 2 ? $dateNaissance[2].$dateNaissance[1].$dateNaissance[0] : null ;
        $reversedDateNaissance = str_replace('"',"-",$reversedDateNaissance);
        $reversedDateRecutement = count($dateRecru) > 2 ?  $dateRecru[2].$dateRecru[1].$dateRecru[0] : null;
        if($reversedDateRecutement)
        $reversedDateRecutement = str_replace('"',"-",$reversedDateRecutement);
       $user = new User();
       $user->setCin(count($record) >= 12 ? $record[12] : $record[11]);
        $user->setSom($record[0]);
        $user->setPosteBudgetaire($record[11]);
        $user->setNomComplet($record[1]);
        $user->setNomCompletAr($record[2]);
        $user->setAdresse($record[9]);
        $user->setAdresseAr($record[8]);
        $reversedDateNaissance ? $user->setDateNaissance(date_create_from_format('Y-m-d',$reversedDateNaissance)) : $user->setDateNaissance(null);
        $user->setLieuNaissance($record[4]);
        $user->setLieuNaissanceAr($record[5]);
        $reversedDateRecutement ? $user->setDateRecrutement(date_create_from_format('Y-m-d',$reversedDateRecutement)) : $user->setDateRecrutement(null);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        }


    }
}
