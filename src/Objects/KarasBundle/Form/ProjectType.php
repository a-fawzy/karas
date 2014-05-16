<?php

namespace Objects\KarasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('occupation')
            ->add('start', 'date', array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'attr'=> array('class'=>'datepicker')
            ))
            ->add('end', 'date', array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'attr'=> array('class'=>'datepicker')
            ))
            ->add('description')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Objects\KarasBundle\Entity\Project'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'objects_karasbundle_project';
    }
}
