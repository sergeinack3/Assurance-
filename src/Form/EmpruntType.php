<?php

namespace App\Form;

use App\Entity\Emprunt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpruntType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero_emprunt')
            ->add('valeur_emprunt')
            ->add('echeance')
            ->add('taux_interet')
            ->add('interet_general')
            ->add('interet_mensuel')
            ->add('motif')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('idMembre')
            ->add('idModPay')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Emprunt::class,
        ]);
    }
}
