<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'attr' => ['class'=>'form-control'],
                'required' => 'true'
            ])
            ->add('lastname', TextType::class, [
                'attr' => ['class'=>'form-control'],
                'required' => 'true'
            ])
            ->add('Pseudo', TextType::class, [
                'attr' => ['class'=>'form-control'],
                'required' => 'true'
            ])
            ->add('email', EmailType::class, [
                'attr' => ['class'=>'form-control'],
                'required' => 'true'
            ])
            ->add('password', PasswordType::class, [
                'attr' => ['class'=>'form-control'],
                'required' => 'true'
            ])
            ->add('state', ChoiceType::class,[
                'choices' => [ 
                    'Activé' => 'A',
                    'Desactivé' => 'D'],
                'attr' => ['class'=>'form-control'],
                'required' => 'true'    
            ])
            ->add('motif', TextType::class, [
                'attr' => ['class'=>'form-control'],
                'required' => 'true'
            ])
            // ->add('createdAt', DateType::class, [
            //     'attr' => ['class'=>'form-control'],
            //     'required' => 'true'
            // ])
            // ->add('updatedAt', DateTimeType::class, [
            //     'attr' => ['class'=>'form-control'],
            //     'required' => 'true'
            // ])
            ->add('idCatUser')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
