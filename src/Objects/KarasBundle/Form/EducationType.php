<?php

namespace Objects\KarasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EducationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('start', 'date', array(
                'input'  => 'datetime',
                'widget' => 'single_text',
            ))
            ->add('end', 'date', array(
                'input'  => 'datetime',
                'widget' => 'single_text',
            ))
            ->add('field')
            ->add('degree', 'choice', array(
                'choices'   => array(
                    'bachelor'    => 'Bachelor',
                    'master'      => 'Master',
                    'phd'         => 'PHD',
                    'high-school' => 'High School',
                    'diploma'     => 'Diploma',
                )
            ))
            ->add('grade')
            ->add('description')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Objects\KarasBundle\Entity\Education'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'objects_karasbundle_education';
    }
}
