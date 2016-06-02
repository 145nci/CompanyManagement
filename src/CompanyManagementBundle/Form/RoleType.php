<?php

namespace CompanyManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('title')
            ->add('description')
            ->add('create_user', CheckboxType::class, array(
                'label' => 'create users',
                'mapped' => false,
                'property_path' => 'false',
                'required' => false,
                'attr' => array(
                    'class' => 'left1'
                )
            ))
            ->add('delete_user', CheckboxType::class, array(
                'label' => 'delete users',
                'mapped' => false,
                'property_path' => 'false',
                'required' => false,
                'attr' => array(
                    'class' => 'left1'
                )
            ))
            ->add('details_users', CheckboxType::class, array(
                'label' => 'view detailed informations about users',
                'mapped' => false,
                'property_path' => 'false',
                'required' => false,
                 'attr' => array(
                     'class' => 'left1'
                 )
            ))
            ->add('create_role', CheckboxType::class, array(
                'label' => 'create role',
                'mapped' => false,
                'property_path' => 'false',
                'required' => false,
                 'attr' => array(
                     'class' => 'left1'
                 )
            ))
            ->add('view_role', CheckboxType::class, array(
                'label' => 'view role',
                'mapped' => false,
                'property_path' => 'false',
                'required' => false,
                 'attr' => array(
                     'class' => 'left1'
                 )
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CompanyManagementBundle\Entity\Role'
        ));
    }
}
