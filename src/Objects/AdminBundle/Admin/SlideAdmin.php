<?php

namespace Objects\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class SlideAdmin extends Admin
{
    /**
    * this variable holds the route name prefix for this actions
    * @var string
    */
    protected $baseRouteName = 'slide_admin';

    /**
    * this variable holds the url route prefix for this actions
    * @var string
    */
    protected $baseRoutePattern = 'slide';

    
    
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('image')
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
            ->add('image', NULL, array('template' => 'ObjectsAdminBundle:General:list_image.html.twig'))
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
        $imageAttributes = array(
		    'onchange' => 'readURL(this);'
        );
        
        if ($this->getSubject() && $this->getSubject()->getId() && $this->getSubject()->getImage()) {
            $imageAttributes['data-image-url'] = $this->getRequest()->getBasePath() . '/' . $this->getSubject()->getSmallImageUrl(60, 60);
            $imageAttributes['data-image-remove-url'] = $this->generateObjectUrl('remove_image', $this->getSubject());
        }

        $formMapper
            ->add('file', 'file', array('required' => false, 'label' => 'image', 'attr' => $imageAttributes))
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
            ->add('image', NULL, array('template' => 'ObjectsAdminBundle:General:show_image.html.twig'))
            ->add('power')
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
