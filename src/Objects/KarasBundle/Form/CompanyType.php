<?php

namespace Objects\KarasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompanyType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('industry', 'entity', array(
                'class' => 'ObjectsKarasBundle:Industry',
                'property' => 'title',
            ))
            ->add('about')
            ->add('countryCode', 'country')
            ->add('city')
            ->add('address')
            ->add('type', 'choice', array(
                'choices'   => array(
                    'multi-international' => 'Multi-International', 
                    'international' => 'International', 
                    'local' => 'Local'
                ),
                'required'  => true,
                'multiple' => false,
                'expanded' => false
            ))
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
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Objects\KarasBundle\Entity\Company'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'objects_karasbundle_company';
    }
}
