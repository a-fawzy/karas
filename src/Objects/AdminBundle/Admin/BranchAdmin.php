<?php

namespace Objects\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class BranchAdmin extends Admin
{
    /**
    * this variable holds the route name prefix for this actions
    * @var string
    */
    protected $baseRouteName = 'branch_admin';

    /**
    * this variable holds the url route prefix for this actions
    * @var string
    */
    protected $baseRoutePattern = 'branch';

    
    
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('country')
            ->add('city')
            ->add('poBox')
            ->add('phone')
            ->add('mobile')
            ->add('fax')
            ->add('email')
            ->add('power')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('country')
            ->add('city')
            ->add('poBox')
            ->add('phone')
            ->add('mobile')
            ->add('fax')
            ->add('email')
            ->add('power')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('country')
            ->add('city')
            ->add('poBox')
            ->add('phone')
            ->add('mobile')
            ->add('fax')
            ->add('email')
            ->add('power')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('country')
            ->add('city')
            ->add('poBox')
            ->add('phone')
            ->add('mobile')
            ->add('fax')
            ->add('email')
            ->add('power')
        ;
    }
}
