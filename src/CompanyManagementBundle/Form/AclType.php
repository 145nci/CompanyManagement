<?php

namespace CompanyManagementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AclType extends AbstractType {

    private static $container;

    public static function setContainer($container) {

        self::$container = $container;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('role');

        $router = self::$container->get('router');
        $collection = $router->getRouteCollection();
        $allRoutes = $collection->all();

        foreach ($allRoutes as $route => $params) {

            if (substr($route, 0, 1) === '_') {
                continue;
            }

            $builder->add($route, CheckboxType::class, array(
                'mapped' => false,
                'property_path' => 'false',
                'required' => false,
                'label' => $route,
                'attr' => array(
                    'data-value' => $route,
                    'id' => $route,
                )
            ));
        }

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {

        $resolver->setDefaults(array(
            'data_class' => 'CompanyManagementBundle\Entity\Acl'
        ));
    }
}
