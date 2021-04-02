<?php
/**
 * Created by PhpStorm.
 * User: heshamelarj
 * Date: 1/6/20
 * Time: 7:32 PM
 */

namespace App\Service;


use App\Entity\DocumentType;
use App\Repository\DocumentTypeRepository;
use Doctrine\ORM\EntityManagerInterface;

class DocumentTypeService
{

    private $entityManager;
    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
    }

    public function getDocumentTypeById($id) :  ?DocumentType
    {
        return $this->entityManager->getRepository(DocumentType::class)->find($id);
    }
}