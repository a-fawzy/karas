<?php

namespace Objects\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class JobAdmin extends Admin
{
    
    /**
    * this variable holds the route name prefix for this actions
    * @var string
    */
    protected $baseRouteName = 'job_admin';

    /**
    * this variable holds the url route prefix for this actions
    * @var string
    */
    protected $baseRoutePattern = 'job';
    
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('title')
            ->add('experience')
            ->add('description')
            ->add('gender')
            ->add('skills')
            ->add('languages')
            ->add('salary')
            ->add('allowances')
            ->add('countryCode')
            ->add('city')
            ->add('type')
            ->add('approved')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('title')
            ->add('experience')
            ->add('gender')
            ->add('languages')
            ->add('salary')
            ->add('countryCode')
            ->add('city')
            ->add('type')
            ->add('approved')
            ->add('image', NULL, array('template' => 'ObjectsAdminBundle:General:list_image.html.twig'))
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
        $imageAttributes = array(
		    'onchange' => 'readURL(this);'
        );
        
        if ($this->getSubject() && $this->getSubject()->getId() && $this->getSubject()->getImage()) {
            $imageAttributes['data-image-url'] = $this->getRequest()->getBasePath() . '/' . $this->getSubject()->getSmallImageUrl(60, 60);
            $imageAttributes['data-image-remove-url'] = $this->generateObjectUrl('remove_image', $this->getSubject());
        }
        
        $formMapper
            ->add('title')
            ->add('industry', 'sonata_type_model', array(), array(
                        'placeholder' => 'No industry selected'
            ))
            ->add('profession', 'sonata_type_model', array(), array(
                        'placeholder' => 'No profession selected'
            ))
            ->add('experience')
            ->add('description')
            ->add('gender', 'choice', array(
                'choices'   => array(
                    'Both' => 'Any',
                    'male'   => 'Male',
                    'female' => 'Female',
            )))
            ->add('skills')
            ->add('languages')
            ->add('salary', null, array('required' => false))
            ->add('allowances', null, array('required' => false))
            ->add('countryCode', 'country')
            ->add('city')
            ->add('type', 'choice', array(
                'choices'   => array(
                    'internal'   => 'By Company',
                    'paper' => 'Paper Job',
            )))
            ->add('file', 'file', array('required' => false, 'label' => 'image', 'attr' => $imageAttributes))
            ->add('approved', null, array('required' => false))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('title')
            ->add('experience')
            ->add('description')
            ->add('gender')
            ->add('skills')
            ->add('languages')
            ->add('salary')
            ->add('allowances')
            ->add('countryCode')
            ->add('city')
            ->add('type')
            ->add('image', NULL, array('template' => 'ObjectsAdminBundle:General:show_image.html.twig'))
            ->add('approved')
        ;
    }
    
    /**
    * this function is for editing the routes of this class
    * @param RouteCollection $collection
    */
    protected function configureRoutes(RouteCollection $collection) {
            $collection->add('remove_image', $this->getRouterIdParameter() . '/remove-image');
    }


}
