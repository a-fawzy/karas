<?php

namespace Objects\KarasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdditionalType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('interests')
            ->add('firstName')
            ->add('dateOfBirth', 'date', array(
                'input'  => 'datetime',
                'widget' => 'single_text',
            ))
            ->add('marital', 'choice', array(
                'choices'   => array(
                    '0'   => 'Married',
                    '1'    => 'Single',
                )
            ))
            ->add('nationality', 'country')
            ->add('gender', 'choice', array(
                'choices'   => array(
                    '1'   => 'Male',
                    '0'    => 'Female',
                )
            ))
            ->add('file')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Objects\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'objects_userbundle_additional';
    }
}
