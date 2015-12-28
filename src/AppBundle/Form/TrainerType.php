<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrainerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("name", TextType::class, [
                'label' => 'Name',
                'attr' => ['class' => 'form-control']
            ])
            ->add("country", TextType::class, [
                'label' => 'Country',
                'attr' => ['class' => 'form-control']
            ])
            ->add("age", IntegerType::class, [
                'label' => 'Age',
                'attr' => ['class' => 'form-control']
            ])
            ->add("team", EntityType::class, [
                'attr' => ['class' => 'form-control'],
                'class' => 'AppBundle\Entity\Team',
                'choice_label' => 'name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Trainer'
        ]);
    }
    public function getName()
    {
        return 'trainer';
    }
}