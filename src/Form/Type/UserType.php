<?php
/**
 * Created by PhpStorm.
 * User: heshamelarj
 * Date: 2/4/20
 * Time: 8:13 PM
 */

namespace App\Form\Type;
use App\Entity\SituationsFamiliale;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UserType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder
            ->add('cin',TextType::class)
            ->add('som',TextType::class)
            ->add('email',EmailType::class)
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Mot de pass'],
                'second_options' => ['label' => 'Confirmer mot de pass'],
            ])
            ->add('poste_budgetaire',TextType::class)
            ->add('nom',TextType::class)
            ->add('nom_ar',TextType::class, [
                'required' => false,
                'label' => 'النسب'
            ])
            ->add('prenom_1',TextType::class)
            ->add('prenom_2',TextType::class, [
                'required' => false
            ])
            ->add('prenom_ar1',TextType::class, [
                'required' => false,
                'label' => 'الاسم 1'
            ])
            ->add('prenom_ar2',TextType::class,[
                'required' => false,
                'label' => 'الاسم 2'
            ])
            ->add('date_naissance',DateType::class)
            ->add('date_recrutement',DateType::class)
            ->add('lieu_naissance',TextType::class)
            ->add('lieu_naissance_ar',TextType::class, [
                'required' => false,
                'label' => 'مكان الازدياد'
            ])
            ->add('adresse',TextType::class)
            ->add('adresse_ar',TextType::class, [
                'required' => false,
                'label' => 'العنوان'
            ])
            ->add('telephone',TextType::class)
            ->add('fax',TextType::class,[
                'required' => false])
        ->add('valider', SubmitType::class);

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
