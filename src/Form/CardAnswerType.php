<?php

namespace App\Form;

use App\Entity\Cards;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CardAnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Facile',SubmitType::class,['label' => 'Facile'])
            ->add('Moyen',SubmitType::class, ['label' => 'Moyen'])
            ->add('Difficile',SubmitType::class,['label' => 'Difficile'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cards::class,
        ]);
    }
}
