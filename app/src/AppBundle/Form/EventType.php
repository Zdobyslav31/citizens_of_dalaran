<?php
/**
 * Event type.
 */
namespace AppBundle\Form;
use AppBundle\Entity\Event;
use AppBundle\Entity\Tag;
use AppBundle\Form\Type\TagsInputType;
use AppBundle\Repository\TagRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
/**
 * Class EventType.
 */
class EventType extends AbstractType
{
    private $tagRepository;

    /**
     * EventType constructor.
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
            'name',
            TextType::class,
            [
                'label' => 'label.event_name',
                'required' => true,
                'attr' => [
                    'max_length' => 255,
                ],
            ]
        );
        $builder->add(
            'dateStart',
            DateTimeType::class,
            [
                'label' => 'label.date_start',
                'required' => true,
            ]
        );
        $builder->add(
            'dateEnd',
            DateTimeType::class,
            [
                'label' => 'label.date_end',
                'required' => true,
            ]
        );
        $builder->add(
            'location',
            TextType::class,
            [
                'label' => 'label.location',
                'required' => false,
                'attr' => [
                    'max_length' => 255,
                ],
            ]
        );
        $builder->add(
            'locationLink',
            UrlType::class,
            [
                'label' => 'label.location_link',
                'required' => false,
                'attr' => [
                    'default_protocol' => 'https',
                ],
            ]
        );
        $builder->add(
            'price',
            MoneyType::class,
            [
                'label' => 'label.price',
                'required' => false,
                'currency' => 'PLN',
            ]
        );
        $builder->add(
            'participantsLimit',
            IntegerType::class,
            [
                'label' => 'label.participants_limit',
                'required' => false,
            ]
        );
        $builder->add(
            'summary',
            TextareaType::class,
            [
                'label' => 'label.event_summary',
                'required' => true,
                'attr' => [
                    'max_length' => 1000,
                    'rows' => 3,
                ],
            ]
        );
        $builder->add(
            'description',
            TextareaType::class,
            [
                'label' => 'label.description',
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
                'label' => 'label.event_image',
                'data_class' => null,
            ]
        );
        $builder->add('applicationsAllowed',
            ChoiceType::class,
            [
                'label' => 'label.applications_allowed',
                'required' => true,
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ]
            ]
        );
        $builder->add('displayedMain',
            ChoiceType::class,
            [
                'label' => 'label.displayed_main',
                'required' => true,
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ]
            ]
        );
//        $builder->add(
//            'tag',
//            TagsInputType::class,
//            [
//                'label' => 'label.event_tag',
//                'required' => false,
//            ]
//        );
//        $builder->add(
//            'templateApplication',
//            EntityType::class,
//            [
//                'class' => 'AppBundle:Application',
//                'choice_label' => 'id',
//            ]
//        );
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
                'data_class' => Event::class,
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
        return 'event';
    }
}