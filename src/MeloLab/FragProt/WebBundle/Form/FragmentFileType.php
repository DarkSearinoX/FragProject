<?php

namespace MeloLab\FragProt\WebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FragmentFileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pdbName')
            ->add('fragment')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MeloLab\FragProt\WebBundle\Entity\FragmentFile'
        ));
    }

    public function getName()
    {
        return 'melolab_fragprot_webbundle_fragmentfiletype';
    }
}
