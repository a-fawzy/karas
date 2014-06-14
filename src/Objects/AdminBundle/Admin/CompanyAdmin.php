<?php

namespace Objects\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class CompanyAdmin extends Admin
{
    
    /**
    * this variable holds the route name prefix for this actions
    * @var string
    */
    protected $baseRouteName = 'company_admin';

    /**
    * this variable holds the url route prefix for this actions
    * @var string
    */
    protected $baseRoutePattern = 'company';


    
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('name')
            ->add('countryCode')
            ->add('city')
            ->add('type')
            ->add('phone')
            ->add('fax')
            ->add('website')
            ->add('poBox')
            ->add('public')
            ->add('contactName')
            ->add('contactEmail')
            ->add('contactPhone')
            ->add('contactMobile')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('name')
            ->add('countryCode')
            ->add('city')
            ->add('type')
            ->add('phone')
            ->add('website')
            ->add('workFrom')
            ->add('workTo')
            ->add('public')
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
            ->add('name')
            ->add('about')
            ->add('countryCode')
            ->add('city')
            ->add('address')
            ->add('type')
            ->add('phone')
            ->add('fax')
            ->add('website')
            ->add('workFrom')
            ->add('workTo')
            ->add('poBox')
            ->add('public')
            ->add('contactName')
            ->add('contactPosition')
            ->add('contactEmail')
            ->add('contactPhone')
            ->add('contactMobile')
            ->add('contactAddress')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('name')
            ->add('about')
            ->add('countryCode')
            ->add('city')
            ->add('address')
            ->add('type')
            ->add('phone')
            ->add('fax')
            ->add('website')
            ->add('workFrom')
            ->add('workTo')
            ->add('poBox')
            ->add('public')
            ->add('contactName')
            ->add('contactPosition')
            ->add('contactEmail')
            ->add('contactPhone')
            ->add('contactMobile')
            ->add('contactAddress')
        ;
    }
}