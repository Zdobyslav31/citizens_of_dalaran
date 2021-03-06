<?php
/**
 * News type.
 */
namespace AppBundle\Form;

use AppBundle\Entity\News;
use AppBundle\Form\Type\TagsInputType;
use AppBundle\Repository\TagRepository;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class NewsType.
 */
class NewsType extends AbstractType
{
    private $tagRepository;


    /**
     * NewsType constructor.
     *
     * @param TagRepository $tagRepository Tag repository
     */
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }
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
                    'max_length' => 255,
                ],
            ]
        );
        $builder->add(
            'tags',
            TagsInputType::class,
            [
                'label' => 'label.tags',
                'required' => false,
            ]
        );
        $builder->add(
            'summary',
            TextareaType::class,
            [
                'label' => 'label.summary',
                'required' => true,
                'attr' => [
                    'max_length' => 1000,
                    'class' => 'tinymce',
                    'rows' => 3,
                ],
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
        $builder->add(
            'imageFile',
            null,
            [
                'label' => 'label.image',
                'data_class' => null,
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
                'data_class' => News::class,
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
        return 'news';
    }
}
