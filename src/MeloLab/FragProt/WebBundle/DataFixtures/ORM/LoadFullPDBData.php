<?php

namespace MeloLab\FragProt\WebBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MeloLab\FragProt\WebBundle\Entity\FullPDB;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Load aminoacid data into the database.
 * @author Felipe Rodriguez <ferodriguez.mbl@gmail.com>
 */
class LoadFullPDBData implements FixtureInterface, ContainerAwareInterface
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
        $tableName = $em->getClassMetadata('MeloLabFragProtWebBundle:FullPDB')->getTableName();
        $em->getConnection()->exec("ALTER TABLE $tableName AUTO_INCREMENT = 1;");

        //Read file contents
        $handle = fopen("/var/www/FragProject/src/MeloLab/FragProt/WebBundle/DBData/AllPdbStructures.csv", "r") or die("Couldn't get handle");
        if ($handle) {
            while (!feof($handle)) {
                $bufferArray = array();
                $buffer = fgets($handle, 4096);
                $bufferArray = explode(',', $buffer);
                
                
//                echo $bufferArray[0];
//                echo '\n';
//                echo $bufferArray[1];
//                echo '\n';
//                echo $bufferArray[2];
                
                
                
                /* 01 */ 
                $e = new FullPDB();
                $e->setFourLetterName($bufferArray[0]);
                $e->setResolution($bufferArray[2]);
                $e->setFullName($bufferArray[1]);        
                $manager->persist($e);
//                
                break;
            }
            fclose($handle);
        }
        
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 10; // the order in which fixtures will be loaded
    }    
}