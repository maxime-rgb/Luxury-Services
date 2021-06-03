<?php

namespace App\Form;

use App\Entity\Candidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;



class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('country')
            ->add('cv', FileType::class, [
                'mapped'=>false,
                'required'=>false
            ])
            ->add('profile_picture', FileType::class, [
                'mapped'=>false,
                'required'=>false
            ])
            ->add('current_location')
            ->add('adress')
            ->add('nationality')
            ->add('availability')
            ->add('short_description')
            ->add('active')
            ->add('passport', FileType::class, [
                'mapped'=>false,
                'required'=>false
            ])
            ->add('job_category')
            ->add('experience')
            ->add('gender')
            ->add('birth_place')
            ->add('birth_date', DateType::class, [

                'widget'=>'single_text',

            ])
            
            ->add('user', UserType::class, [
                'mapped'=>false,
                'required'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
