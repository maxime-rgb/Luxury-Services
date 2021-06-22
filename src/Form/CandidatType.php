<?php

namespace App\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use App\Entity\Experience;
use App\Entity\Candidat;
use App\Entity\Gender;
use App\Entity\JobCategory;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;



class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name')
            ->add('last_name')

            ->add('country', TextType::class,[
                'required' => false,
                'empty_data' => '',
            ])

            ->add('cv', FileType::class, [
                'mapped'=>false,
                'required'=>false
            ])
            ->add('profile_picture', FileType::class, [
                'mapped'=>false,
                'required'=>false
            ])
            ->add('current_location', TextType::class,[
                'required' => false,
                'empty_data' => '',
            ])
            ->add('adress', TextType::class,[
                'required' => false,
                'empty_data' => '',
            ])
            ->add('nationality', TextType::class,[
                'required' => false,
                'empty_data' => '',
            ])
            ->add('availability')

            ->add('short_description', TextType::class,[
                'required' => false,
                'empty_data' => '',
            ])

            ->add('passport', FileType::class, [
                'mapped'=>false,
                'required'=>false
            ])

            ->add('job_category', EntityType::class, [
                'class'=>JobCategory::class
            ])

            ->add('experience', EntityType::class, [
                'class'=>Experience::class
            ])
            ->add('gender', EntityType::class, [
                'class'=>Gender::class
            ])
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
