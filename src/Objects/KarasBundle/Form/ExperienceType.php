<?php

namespace Objects\KarasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExperienceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company')
            ->add('title')
            ->add('start', 'date', array(
                'input'  => 'datetime',
                'widget' => 'single_text',
            ))
            ->add('end', 'date', array(
                'input'  => 'datetime',
                'widget' => 'single_text',
            ))
            ->add('description')
            ->add('countryCode', 'country')
            ->add('city')
            ->add('profession', 'entity', array(
                'class' => 'ObjectsKarasBundle:Profession',
                'property' => 'title',
            ))
            ->add('industry', 'entity', array(
                'class' => 'ObjectsKarasBundle:Industry',
                'property' => 'title',
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Objects\KarasBundle\Entity\Experience'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'objects_karasbundle_experience';
    }
}
