<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamType extends AbstractType
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
            ->add("players", EntityType::class, [
                'label' => 'Players',
                'attr' => ['class' => 'form-control'],
                'class' => 'AppBundle\Entity\Player'
            ])
            ->add("trainers", EntityType::class, [
                'label' => 'Trainers',
                'attr' => ['class' => 'form-control'],
                'class' => 'AppBundle\Entity\Trainer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Team'
        ]);
    }
    public function getName()
    {
        return 'app_bundle_team_type';
    }
}