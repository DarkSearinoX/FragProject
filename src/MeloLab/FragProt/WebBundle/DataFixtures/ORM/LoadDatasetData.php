<?php

namespace MeloLab\FragProt\WebBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MeloLab\FragProt\WebBundle\Entity\Dataset;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Load aminoacid data into the database.
 * @author Felipe Rodriguez <ferodriguez.mbl@gmail.com>
 */
class LoadDatasetData implements FixtureInterface, ContainerAwareInterface
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
        $tableName = $em->getClassMetadata('MeloLabFragProtWebBundle:Dataset')->getTableName();
        $em->getConnection()->exec("ALTER TABLE $tableName AUTO_INCREMENT = 1;");

        /* 01 */ 
        $e = new Dataset(); 
        $e->setFullName('PDBNR');
        $e->setDescription('Non Redundant set from all the PDB');
        $manager->persist($e);
        
        /* 01 */ 
        $e = new Dataset(); 
        $e->setFullName('PDB near DNA');
        $e->setDescription('Fragments extracted from PDB DNA Complexes, with the condition of being near the DNA Structure in at least at 6 A');
        $manager->persist($e);
        
        /* 01 */ 
        $e = new Dataset(); 
        $e->setFullName('Small non redundant set');
        $e->setDescription('Small non Redundant set of 74 structures from the PDB');
        $manager->persist($e);
        
        
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 1; // the order in which fixtures will be loaded
    }    
}