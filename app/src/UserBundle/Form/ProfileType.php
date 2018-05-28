<?php
/**
 * Created by PhpStorm.
 * User: jedrzej
 * Date: 26.05.18
 * Time: 12:25
 */

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('profilePictureFile',
            null,
            [
                'label' => 'label.image',
            ]
        );
        $builder->add(
            'description',
            TextareaType::class,
            [
                'label' => 'label.description',
                'required' => false,
                'attr' => [
                    'max_length' => 254,
                    'rows' => 2,
                ],
            ]
        );
        $builder->add(
            'name',
            TextType::class,
            [
                'label' => 'label.names',
                'required' => false,
                'attr' => [
                    'max_length' => 254,
                ],
            ]
        );
        $builder->add(
            'dateOfBirth',
            BirthdayType::class,
            [
                'label' => 'label.birthday',
                'required' => false,
            ]
        );
        $builder->add(
            'phoneNumber',
            TextType::class,
            [
                'label' => 'label.phone_number',
                'required' => false,
                'attr' => [
                    'max_length' => 44,
                ],
            ]
        );
        $builder->add(
            'emergencyPhone',
            TextType::class,
            [
                'label' => 'label.emergency_phone',
                'required' => false,
                'attr' => [
                    'max_length' => 44,
                ],
            ]
        );
        $builder->add(
            'healthIssues',
            TextareaType::class,
            [
                'label' => 'label.health_issues',
                'required' => false,
                'attr' => [
                    'max_length' => 999,
                    'rows' => 4,
                ],
            ]
        );
        $builder->add(
            'nourishmentIssues',
            TextareaType::class,
            [
                'label' => 'label.nourishment_issues',
                'required' => false,
                'attr' => [
                    'max_length' => 999,
                    'rows' => 4,
                ],
            ]
        );
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }
}