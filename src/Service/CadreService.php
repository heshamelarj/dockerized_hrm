<?php
/**
 * Created by PhpStorm.
 * User: hicha
 * Date: 18/10/2019
 * Time: 11:05.
 */

namespace App\Service;

use App\Entity\Cadre;
use App\Repository\CadreRepository;
use Doctrine\ORM\EntityManagerInterface;

final class CadreService
{
    private $cadreRepo;
    private $entityManager;

    public function __construct(CadreRepository $cadreRep, EntityManagerInterface $em)
    {
        $this->cadreRepo = $cadreRep;
        $this->entityManager = $em;
    }
      /**
     * @return \App\Entity\Cadre[]
     */
    public function getCadres()
    {
        return $this->cadreRepo
            ->findAll()
         ;
    }
}