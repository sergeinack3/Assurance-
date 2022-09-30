<?php

namespace App\Form;

use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('sex', ChoiceType::class,
                [ 'choices' => [
                    'Masculin' => 'M',
                    'Feminin' => 'F',
                    'Autres' => 'O'
                ] ])
            ->add('grade', ChoiceType::class,
                [ 'choices' => [ 
                    'Employé ouvrier' => 'Employé ouvrier',
                    'Agent de maitrise' => 'Agent de maitrise',
                    'Cadre' => 'Cadre'
                ] ])
            ->add('email', TextType::class)
            ->add('cotisation')
            ->add('adresse', TextType::class)
            ->add('work_place', TextType::class)
            ->add('date_birth')
            ->add('phone_number', TextType::class)
            ->add('id_cart')
            ->add('hiring_date')
            ->add('sate_member',ChoiceType::class,
                [ 'choices' => [ 
                    'Activé' => 'A',
                    'Desactivé' => 'D'
                ] ])
            // ->add('motif')
            // ->add('createdAt')
            // ->add('updatedAt')
            // ->add('idUser')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Membre::class,
        ]);
    }
}
