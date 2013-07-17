<?php

namespace MeloLab\FragProt\WebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * @author Felipe Rodriguez <ferodriguez.mbl@gmail.com>
 */

class InformationSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder
            ->add('set','entity',array('class'=>'MeloLabFragProtWebBundle:Dataset','label' => 'Dataset','empty_value'=>'Select dataset'))    
            ->add('sequence','text',array( 'label' => 'Sequence','required'=>false))
            ->add('pdb_code','text',array('label'=> 'PDB ID','required'=>false))
            ->add('init_pos','integer',array('label'=>'Initial Position','required'=>false))
            ->add('end_pos','integer',array('label'=>'Ending Position','required'=>false))
            ->add('chain','text',array('label'=> 'Chain','required'=>false))
            ->add('group','integer',array('label'=>'Initial Position','required'=>false))
        ;
            
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
//        $resolver->setDefaults(array(
//            'data_class' => 'MeloLab\FragProt\WebBundle\Entity\Fragment'
//        ));
    }

    public function getName() {
        return 'SequenceSearch';
    }
}

?>
