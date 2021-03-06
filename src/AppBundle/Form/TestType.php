<?php
/**
 * Test type.
 */
namespace AppBundle\Form;

use AppBundle\Entity\Test;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

/**
 * Class TestType.
 *
 * @package AppBundle\Form
 */
class TestType extends AbstractType
{
    /**
     * {@inheritdoc}
     *
     * @param FormBuilderInterface $builder Form builder
     * @param array                $options Form options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'name',
            TextType::class,
            [
                'label' => 'form.test.name',
                'required' => true,
            ]
        );
        $builder->add(
            'content',
            CKEditorType::class,
            [
                'label' => 'form.test.content',
                'required' => true,
            ]
        );
        $builder->add(
            'time',
            NumberType::class,
            [
                'label' => 'form.test.time',
                'required' => true,
            ]
        );
        $builder->add(
            'group',
            EntityType::class,
            [
                'label' => 'form.test.group',
                'required' => true,
                'class' => 'AppBundle:Group',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('g')
                        ->join('AppBundle:Year', 'y')
                        ->where('g.year = y.id')
                        ->andWhere('y.active = 1')
                        ->orderBy('g.name', 'ASC');
                },
            ]
        );
        $builder->add(
            'questions',
            EntityType::class,
            array(
                'class' => 'AppBundle:Question',
                'choice_label' => 'name',
                'multiple' => true,
                'label' => 'form.test.questions',
                'required' => true,
            )
        );
        $builder->add(
            'ip',
            TextareaType::class,
            [
                'label' => 'form.test.allowed_ip',
                'required' => false,
                'attr' => ['rows' => 10],
            ]
        );
        $builder->get('ip')->addModelTransformer(
            new IpDataTransformer()
        );
    }

    /**
     * {@inheritdoc}
     *
     * @param OptionsResolver $resolver Options resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => Test::class,
                'validation_groups' => 'test-default',
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'test_type';
    }
}
