<?php

namespace Objects\KarasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LanguageType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'choice', array(
                'choices'   => array(
                    'english'   => 'English',
                    'french'    => 'French',
                    'germany'   => 'Germany',
                    'italian'   => 'Italian',
                    'spanish'   => 'Spanish',
                )
            ))
            ->add('level', 'choice', array(
                'choices'   => array(
                    'basic'         => 'Basic',
                    'intermediate'  => 'Intermediate',
                    'good'          => 'Good',
                    'excelent'      => 'Excelent',
                    'fluent'        => 'Fluent',
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Objects\KarasBundle\Entity\Language'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'objects_karasbundle_language';
    }
}
