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

class SequenceSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder
            ->add('sequence','text',array( 'label' => 'Sequence',));
            
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
