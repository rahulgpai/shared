<?php
/**
 * Created by PhpStorm.
 * User: rahul
 * Date: 1/29/2016
 * Time: 12:51 AM
 */

namespace RTool\UserBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //parent::buildForm($builder, $options); // TODO: Change the autogenerated stub

        $builder->add('_username', 'Symfony\Component\Form\Extension\Core\Type\TextType', ['label' => 'Username', 'required' => true])
                ->add('_password', 'Symfony\Component\Form\Extension\Core\Type\PasswordType', ['label' => 'Password', 'required'=>true])
                ->setAction("/login_check");
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        //return parent::getBlockPrefix(); // TODO: Change the autogenerated stub
        return '';
    }

    /**
     * @return string
     */
    public function getName()
    {
        //return parent::getName(); // TODO: Change the autogenerated stub
        return '';
    }
}