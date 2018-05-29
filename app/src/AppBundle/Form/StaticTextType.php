<?php
/**
 * Text type.
 */
namespace AppBundle\Form;

use AppBundle\Entity\Text;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class StaticTextType.
 */
class StaticTextType extends AbstractType
{

    /**
     * {@inheritdoc}
     *
     * @param \Symfony\Component\Form\FormBuilderInterface $builder Form builder
     * @param array                                        $options Options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'title',
            TextType::class,
            [
                'label' => 'label.title',
                'required' => true,
                'attr' => [
                    'max_length' => 254,
                ],
            ]
        );
        $builder->add(
            'parentTitle',
            ChoiceType::class,
            [
                'label' => 'label.parent_title',
                'required' => true,
                'choices' => [
                    'Czym jest larp?' => 'what_is_larp',
                    'Rodzaje' => 'types',
                    'Pojęcia' => 'terms',
                    'Historia' => 'history',
                    'Larpy w Polsce' => 'in_poland',
                    'O serwisie' => 'about_website',
                    'O grupie' => 'about',
                    'Kontakt' => 'contact',
                ],
                'expanded' => true
            ]
        );
        $builder->add(
            'number',
            NumberType::class,
            [
                'label' => 'label.number',
                'required' => true,
            ]
        );
        $builder->add(
            'content',
            TextareaType::class,
            [
                'label' => 'label.content',
                'required' => true,
                'attr' => [
                    'max_length' => 16777215,
                    'class' => 'tinymce',
                    'rows' => 8,
                ],
            ]
        );
        $builder->add('imageFile',
            null,
            [
                'label' => 'label.image',
            ]
        );
        $builder->add(
            'imgDescription',
            TextareaType::class,
            [
                'label' => 'label.image_description',
                'required' => false,
                'attr' => [
                    'max_length' => 999,
                    'class' => 'tinymce',
                    'rows' => 1,
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     *
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver Resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => Text::class,
            ]
        );
    }

    /**
     * {@inheritdoc}
     *
     * @return null|string Result
     */
    public function getBlockPrefix()
    {
        return 'text';
    }
}