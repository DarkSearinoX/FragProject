<?php

namespace MeloLab\FragProt\WebBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MeloLab\FragProt\WebBundle\Entity\FragmentType;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Load aminoacid data into the database.
 * @author Felipe Rodriguez <ferodriguez.mbl@gmail.com>
 */
class LoadFragmentTypeData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        $em = $this->container->get('doctrine')->getManager();
        
        // Reset ID column
        $tableName = $em->getClassMetadata('MeloLabFragProtWebBundle:FragmentType')->getTableName();
        $em->getConnection()->exec("ALTER TABLE $tableName AUTO_INCREMENT = 1;");

        /* 01 */ 
        $e = new FragmentType(); 
        $e->setFullName('Seed');
        $e->setShortName('S');
        $manager->persist($e);
        
        /* 01 */ 
        $e = new FragmentType(); 
        $e->setFullName('Fragment');
        $e->setShortName('F');
        $manager->persist($e);
        
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 2; // the order in which fixtures will be loaded
    }    
}