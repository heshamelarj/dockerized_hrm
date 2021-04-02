<?php

namespace App\DataFixtures;

use App\Entity\Cadre;
use App\Entity\Departement;
use App\Entity\Situation;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class SituationFixtures extends Fixture implements FixtureGroupInterface
{
    private $password_encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->password_encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setCin("F00002");
        $user ->setEmail("root@host.com");
        $user->setPassword($this->password_encoder->encodePassword($user,"0000"));
        $user->setNom("Johson");
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setPrenom1("Joe");
        $user->setPrenom2("Francis");
        $user->setNomAr("لسش");
        $user->setPrenomAr1("لبيس");
        $user->setPrenomAr2("بسسشص");
        $user->setSom("19728223");
        $user->setAdresse("Adresse NR 12");
        $user->setAdresseAr("بشسشس سششسشس خنتس ");
        $user->setDateNaissance(\DateTime::createFromFormat("Y-m-d H:m:i","1972-10-10 00:00:00"));
        $user->setLieuNaissance("NYC");
        $user->setLieuNaissanceAr("باتستس  سلسا ");
        $user->setDateRecrutement(\DateTime::createFromFormat("Y-m-d H:m:i","2000-10-10 00:00:00"));
        $user->setPosteBudgetaire("1921231");
        $user->setTelephone("21206282146");
        $user->setFax("0531233001");

        $depart = new Departement();
        $depart->setLabel("IT Technicien");
        $depart->addUser($user);
        $depart->createdAt();
        $depart->updatedAt();
        $manager->persist($depart);
        $user->setDepartement($depart);
        $manager->persist($user);

        $user1 = new User();
        $user1->setCin("F00003");
        $user1 ->setEmail("user@host.com");
        $user1->setPassword($this->password_encoder->encodePassword($user,"0000"));
        $user1->setNom("Gray");
        $user1->setRoles(["ROLE_USER"]);
        $user1->setPrenom1("Norman");
        $user1->setPrenom2("Franc");
        $user1->setNomAr("لسش");
        $user1->setPrenomAr1("لبيس");
        $user1->setPrenomAr2("بسسشص");
        $user1->setSom("19728313");
        $user1->setAdresse("Adresse NR 14");
        $user1->setAdresseAr("بشسشس سششسشس خنتس ");
        $user1->setDateNaissance(\DateTime::createFromFormat("Y-m-d H:m:i","1990-10-10 00:00:00"));
        $user1->setLieuNaissance("NYC");
        $user1->setLieuNaissanceAr("باتستس  سلسا ");
        $user1->setDateRecrutement(\DateTime::createFromFormat("Y-m-d H:m:i","2018-10-10 00:00:00"));
        $user1->setPosteBudgetaire("19210011");
        $user1->setTelephone("21206282146");
        $user1->setFax("0531233001");

        $cadre1 = new Cadre();
        $cadre1->setTitle("Technicien 3éme Grade");
        $cadre1    ->setEchelle(9);
        $cadre1    ->setDescription("Un diplome etat de Deux Ans apret le Bac");
        $cadre1    ->createdAt();
        $cadre1    ->updatedAt();
        $cadre2 = new Cadre();
        $cadre2->setTitle("Administrateur 2éme Grade");
        $cadre2->setEchelle(11);
        $cadre2->setDescription("Un diplome etat de cinq Ans apret le Bac");
        $cadre2->createdAt();
        $cadre2->updatedAt();
        $cadre3 = new Cadre();
        $cadre3->setTitle("Professeur de l'Ensiegnent Assistant Superieur");
        $cadre3->setEchelle(12);
        $cadre3->setDescription("Doctorant");
        $cadre3->createdAt();
        $cadre3->updatedAt();

        $manager->persist($cadre1);
        $manager->persist($cadre2);
        $manager->persist($cadre3);

        $user->setCadre($cadre1);
        $user1->setCadre($cadre3);

        $depart1 = new Departement();
        $depart1->setLabel("IT Technicien");
        $depart1->addUser($user);
        $depart1->createdAt();
        $depart1->updatedAt();
        $manager->persist($depart1);
        $user1->setDepartement($depart1);

        $manager->persist($user1);



        $situation1 = new Situation();
        $situation1->setUser($user);
           $situation1 ->setCadre($cadre1);
           $situation1 ->setEchelon(1);
           $situation1 ->setDateEffet(new \DateTime());
           $situation1 ->setNumeroIndocatif(127);
           $situation1 ->setRemarks("stagiare");
        $user->addSituation($situation1);


    $manager->persist($situation1);
        $situation2 = new Situation();

        $situation2->setUser($user1);
          $situation2->setCadre($cadre2);
          $situation2->setEchelon(1);
          $situation2->setDateEffet(new \DateTime());
          $situation2->setNumeroIndocatif(630);
          $situation2->setRemarks("legit");
          $user1->addSituation($situation2);
    $manager->persist($situation2);
        $manager->flush();
    }
    public static function getGroups(): array
    {
        return ['user_situation'];
    }
}
