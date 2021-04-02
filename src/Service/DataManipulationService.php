<?php
/**
 * Created by PhpStorm.
 * User: hicha
 * Date: 18/10/2019
 * Time: 11:25
 */

namespace App\Service;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

final class DataManipulationService
{
    private $serializer;
    public function __construct( SerializerInterface $serializer){
        $this->serializer = $serializer;
    }



    public function toJSON($data){
        return $this->serializer->serialize($data, 'json' ,[
        'circular_reference_handler' => function ($object) {
            return $object->getId();
        }
]);
    }

}