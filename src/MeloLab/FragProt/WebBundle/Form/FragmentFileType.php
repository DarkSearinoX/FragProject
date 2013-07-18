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
            ->add('fragment','file',array('label'=>'Protein Fragment (.pdb format) (1MB max):'))
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
