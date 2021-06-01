<?php

namespace App\Form;

use App\Entity\Candidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('country')
            ->add('cv')
            ->add('profile_picture')
            ->add('current_location')
            ->add('adress')
            ->add('nationality')
            ->add('availability')
            ->add('short_description')
            ->add('active')
            ->add('passport')
            ->add('job_category')
            ->add('experience')
            ->add('user')
            ->add('gender')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
