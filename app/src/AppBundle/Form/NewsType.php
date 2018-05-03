<?php
/**
 * News type.
 */
namespace AppBundle\Form;

use AppBundle\Entity\News;
use AppBundle\Entity\Tag;
use AppBundle\Entity\User;
use AppBundle\Repository\TagRepository;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class NewsType.
 */
class NewsType extends AbstractType
{
    /**
     * NewsType constructor.
     *
     * @param TagRepository $tagsRepository Tag repository
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
            EntityType::class,
            [
                'class' => Tag::class,
                'choice_label' => function (Tag $tag) {
                    return $tag->getName();
                },
                'label' => 'label.tags',
                'required' => false,
                'expanded' => true,
                'multiple' => true,
            ]
        );
        $builder->add(
            'creator',
            EntityType::class,
            [
                'class' => User::class,
                'choice_label' => function (User $user) {
                    return $user->getLogin();
                },
                'label' => 'label.creator',
                'required' => true,
                'expanded' => true,
                'multiple' => false,
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
                    'rows' => 6,
                ],
            ]
        );
        $builder->add(
            'img',
            TextType::class,
            [
                'label' => 'label.image',
                'required' => false,
                'attr' => [
                    'max_length' => 200,
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