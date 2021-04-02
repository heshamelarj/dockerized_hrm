<?php
/**
 * Created by PhpStorm.
 * User: heshamelarj
 * Date: 4/17/20
 * Time: 10:53 PM
 */

namespace App\Form\Type;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class AutorisationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'som',
                'label' => 'SOM'
            ])
            ->add('type',ChoiceType::class,[
                'label' => "Autorisation de",
                'choices' => [
                    ' Quitter Le Territoire' => 'Autorisation Quitter Le Territoire' ,
                    " d'absence" => "Autorisations d'absence",
                    "Congés annuels et fêtes légales" => "Congés annuels et fêtes légales",
                    "Congé parental et congé de présence parentale" => "Congé parental et congé de présence parentale"
                ]
            ])
            ->add('motif',TextareaType::class,[
                'label' => 'Le Motif'
            ])
            ->add('detail',TextareaType::class,[
                'label' => 'Les Details'
            ])
            ->add('granted', CheckboxType::class, [
                'label' => "Apprové ?",
                'required' => true
            ])

            ->add('date_debut', DateType::class,[
                'label' => "Date Depart",
                'widget' => 'single_text',
            ])
            ->add('date_fin', DateType::class,[
                'label' => "Date Arrivée ",
                'widget' => 'single_text',
            ])
            ->add('save', SubmitType::class,[
                'label' => 'Valider'
            ])
            ->add('cancel', ButtonType::class,[
                'label' => 'Annuler'
            ])
        ;
    }
}




