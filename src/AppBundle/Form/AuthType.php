<?php
/**
 * Auth type.
 */
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class AuthType.
 *
 * @package AppBundle\Form
 */
class AuthType extends AbstractType
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
            'username',
            TextType::class,
            [
                'label' => false,
                'required' => true,
            ]
        );
        $builder->add(
            'password',
            PasswordType::class,
            [
                'label' => false,
                'required' => true,
            ]
        );
        $builder->add(
            'email',
            EmailType::class,
            [
                'label' => 'form.auth.email',
                'required' => true,
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'login_type';
    }
}
