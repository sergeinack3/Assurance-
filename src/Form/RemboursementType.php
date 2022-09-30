<?php

namespace App\Form;

use App\Entity\Remboursement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RemboursementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('motant')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('pret')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Remboursement::class,
        ]);
    }
}
